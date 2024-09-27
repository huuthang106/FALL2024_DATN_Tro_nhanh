export interface Restaurant {
  id: number; // ID của sản phẩm
  title: string; // Tiêu đề của sản phẩm
  description: string; // Mô tả của sản phẩm
  expiration_date: string; // Ngày hết hạn
  price: number; // Giá của sản phẩm
  phone: string; // Số điện thoại liên hệ
  address: string; // Địa chỉ của sản phẩm
  quantity: number; // Số lượng sản phẩm
  longitude: string; // Kinh độ
  latitude: string; // Vĩ độ
  view: number; // Số lượt xem
  slug: string; // Slug cho sản phẩm
  status: number; // Trạng thái của sản phẩm
  user_id: number; // ID của người dùng
  acreages_id: number | null; // ID của diện tích (có thể null)
  acreage: string; // Diện tích
  price_id: number | null; // ID của giá (có thể null)
  category_id: number; // ID của danh mục
  location_id: number; // ID của vị trí
  zone_id: number | null; // ID của khu vực (có thể null)
  tenant_id: number | null; // ID của người thuê (có thể null)
  deleted_at: string | null; // Thời gian xóa (có thể null)
  created_at: string; // Thời gian tạo
  updated_at: string; // Thời gian cập nhật
  province: string; // ID của tỉnh
  district: string; // ID của quận
  village: string; // ID của làng
  location: Location;
  image_url: string;
}

export interface District {
  id: number;
  name: string;
}

export interface Location {
  lat: number;
  long: number;
}

export interface Menu {
  categories: Category[];
}

export interface Category {
  id: number;
  name: string;
  foods: Food[];
}

export interface Food {
  id: number;
  name: string;
  price: number;
  description: string;
  image: string;
  categories: string[];
  extras: Extra[];
  options: Option[];
}

export interface Option {
  key: string;
  label: string;
  selected: boolean;
}

export interface Extra {
  key: string;
  label: string;
  options: {
    key: string;
    label: string;
    selected?: boolean;
  }[];
}

export interface Cart {
  items: CartItem[];
}

export interface CartItem {
  quantity: number;
  food: Food;
  note: string;
}

export type Hours = [number, number, "AM" | "PM"];

export interface Booking {
  id: string;
  restaurant: Restaurant;
  cart?: Cart;
  bookingInfo?: {
    date: Date;
    hour: Hours;
    table: string;
    seats: number;
  };
}

export type TabType = "info" | "menu" | "book";
