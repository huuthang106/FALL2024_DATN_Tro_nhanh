<?php

namespace App\Services;

use App\Models\Zone;
use App\Models\Category;
use App\Models\Room;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class ZoneClientService
{
    private const status = 2;

    public function getZoneImages($zoneId)
    {
        try {
            $zone = Zone::findOrFail($zoneId);
            return $zone->all_images;
        } catch (\Exception $e) {
            Log::error('Error in getZoneImages: ' . $e->getMessage());
            return [];
        }
    }
    public function getZoneWhere()
    {
        return Zone::query()
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }

    public function ZoneClient()
    {
        return Zone::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }

    public function getUniqueLocations()
    {
        try {
            $provinces = Zone::distinct()->whereNotNull('province')->pluck('province', 'province')->toArray();
            $districts = Zone::distinct()->whereNotNull('district')->select('province', 'district')->get()
                ->groupBy('province')
                ->map(function ($items) {
                    return $items->pluck('district')->toArray();
                })
                ->toArray();
            $villages = Zone::distinct()->whereNotNull('village')->select('district', 'village')->get()
                ->groupBy('district')
                ->map(function ($items) {
                    return $items->pluck('village')->toArray();
                })
                ->toArray();

            return [
                'provinces' => $provinces,
                'districts' => $districts,
                'villages' => $villages
            ];
        } catch (\Exception $e) {
            Log::error('Không thể lấy danh sách địa điểm: ' . $e->getMessage());
            return null;
        }
    }

    public function getCategories()
    {
        return Category::whereHas('zones')
            ->select('id', 'name')
            ->get();
    }
    public function getAllZones(int $perPage = 10, $type = null, $searchTerm = null, $province = null, $district = null, $village = null, $category = null, $features = null)
    {
        try {
            $query = Zone::join('users', 'zones.user_id', '=', 'users.id')
                ->where('zones.status', self::status)
                ->select('zones.*')
                ->orderByDesc('zones.created_at');

            if ($type) {
                $query->whereHas('category', function ($q) use ($type) {
                    $q->where('name', $type);
                });
            }

            if ($category) {
                $query->where('category_id', $category);
            }

            if ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('zones.name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('zones.description', 'like', '%' . $searchTerm . '%')
                        ->orWhere('zones.address', 'like', '%' . $searchTerm . '%');
                });
            }

            if ($province) {
                $query->where('zones.province', $province);
            }
            if ($district) {
                $query->where('zones.district', $district);
            }
            if ($village) {
                $query->where('zones.village', $village);
            }

            if (!empty($features)) {
                $query->where(function ($q) use ($features) {
                    foreach ($features as $feature) {
                        $q->orWhere($feature, '>', 0);
                    }
                });
            }

            $result = $query->paginate($perPage);
            Log::info('SQL Query: ' . $query->toSql());
            Log::info('SQL Bindings: ' . json_encode($query->getBindings()));
            return $result;
        } catch (Exception $e) {
            Log::error('Error in getAllZones: ' . $e->getMessage());
            return null;
        }
    }
    public function incrementViewCount($zoneId)
    {
        if (!request()->cookie('viewed_zone_' . $zoneId)) {
            $zone = Zone::find($zoneId);
            if ($zone) {
                $zone->increment('view');
                Cookie::queue('viewed_zone_' . $zoneId, true, 120);
            }
        }
    }

    public function getSlugZone($slug)
    {
        try {
            return Zone::where('slug', $slug)->first();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getZoneCount($userId = null)
    {
        $userId = $userId ?? auth()->id();
        return Zone::where('user_id', $userId)->count();
    }

    public function getZoneClient($province, $currentZoneId)
    {
        return Zone::where('status', self::status)
            ->where('province', $province)
            ->where('id', '<>', $currentZoneId)
            ->get();
    }
    public function getAllZoneInCategory(int $perPage = 10, $type = null, $searchTerm = null, $province = null, $district = null, $village = null, $category = null)
    {
        try {
            $query = Zone::join('users', 'zones.user_id', '=', 'users.id')
                ->where('zones.status', self::status)
                ->select('zones.*')
                ->orderByDesc('zones.created_at');

            if ($type) {
                $query->whereHas('category', function ($q) use ($type) {
                    $q->where('name', $type);
                });
            }

            if ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('zones.name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('zones.description', 'like', '%' . $searchTerm . '%')
                        ->orWhere('zones.address', 'like', '%' . $searchTerm . '%');
                });
            }

            if ($province) {
                $query->where('zones.province', $province);
            }
            if ($district) {
                $query->where('zones.district', $district);
            }
            if ($village) {
                $query->where('zones.village', $village);
            }

            if ($category) {
                Log::info('Applying category filter: ' . $category);
                $query->where('zones.category_id', $category);
            }

            $result = $query->get();
            Log::info('SQL Query: ' . $query->toSql());
            Log::info('SQL Bindings: ' . json_encode($query->getBindings()));
            return $result;
        } catch (Exception $e) {
            Log::error('Error in getAllZoneInCategory: ' . $e->getMessage());
            return null;
        }
    }

    public function checkAndUpdateExpiredZones()
    {
        $currentDate = Carbon::now();
        $expiredZones = Zone::where(function ($query) use ($currentDate) {
            $query->where('created_at', '<=', $currentDate->subDays(30))
                ->orWhereNull('created_at');
        })->get();

        $updatedCount = 0;

        if ($expiredZones->isNotEmpty()) {
            foreach ($expiredZones as $zone) {
                $zone->save();
                $updatedCount++;
            }
        }

        return $updatedCount;
    }

    public function getAllZoneAPI(int $perPage = 10, $type = null, $searchTerm = null, $province = null, $district = null, $village = null, $category = null, $features = null)
    {
        try {
            $query = Zone::join('users', 'zones.user_id', '=', 'users.id')
                ->where('zones.status', self::status)
                ->select('zones.*')
                ->orderByDesc('zones.created_at');

            if ($type) {
                $query->whereHas('category', function ($q) use ($type) {
                    $q->where('name', $type);
                });
            }

            if ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('zones.name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('zones.description', 'like', '%' . $searchTerm . '%')
                        ->orWhere('zones.address', 'like', '%' . $searchTerm . '%');
                });
            }

            if ($province) {
                $query->where('zones.province', $province);
            }
            if ($district) {
                $query->where('zones.district', $district);
            }
            if ($village) {
                $query->where('zones.village', $village);
            }
            if ($category) {
                Log::info('Applying category filter: ' . $category);
                $query->where('zones.category_id', $category);
            }

            if (!empty($features)) {
                $query->where(function ($q) use ($features) {
                    foreach ($features as $feature) {
                        $q->orWhere($feature, 2);
                    }
                });
            }

            $result = $query->get();
            Log::info('SQL Query: ' . $query->toSql());
            Log::info('SQL Bindings: ' . json_encode($query->getBindings()));
            return $result;
        } catch (Exception $e) {
            Log::error('Error in getAllZoneAPI: ' . $e->getMessage());
            return null;
        }
    }

    public function getPopularZones($limit = 3)
    {
        $currentDate = Carbon::now();

        return Zone::where('status', self::status)
            ->where(function ($query) use ($currentDate) {
                $query->where('vip_expiry_date', '>', $currentDate)
                    ->orWhereNull('vip_expiry_date');
            })
            ->orderByRaw('CASE 
                WHEN vip_expiry_date > ? THEN 0 
                ELSE 1 
            END', [$currentDate])
            ->orderByRaw('CASE 
                WHEN vip_expiry_date > ? THEN view 
                ELSE 0 
            END DESC', [$currentDate])
            ->orderBy('view', 'desc')
            ->take($limit)
            ->get();
    }
}
