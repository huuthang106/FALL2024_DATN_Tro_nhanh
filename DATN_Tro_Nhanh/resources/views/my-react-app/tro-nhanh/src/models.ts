export interface Restaurant {
  id: number; // ID của sản phẩm
  name: string; // Tiêu đề của sản phẩm
  description: string; // Mô tả của sản phẩm
  address: string; // Địa chỉ của sản phẩm
  longitude: string; // Kinh độ
  latitude: string; // Vĩ độ
  status: number; // Trạng thái của sản phẩm
  slug: string; // Slug cho sản phẩm
  user_id: number; // ID của người dùng
  deleted_at: string | null; // Thời gian xóa (có thể null)
  created_at: string; // Thời gian tạo
  updated_at: string; // Thời gian cập nhật
  phone: string; // Số điện thoại liên hệ
  category_id: number; // ID của danh mục
  rooms: Room[]; // Mảng các phòng
}

export interface Room {
  id: number; // ID của phòng
  zone_id: number; // ID của khu vực
  image: string; // Hình ảnh của phòng
  price: string; // Giá của phòng
}
export interface District {
  id: number;
  name: string;
}
// models.ts

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
  id: string;        // ID của owner
  name: string;      // Tên owner
  email: string;     // Email owner
  balance: string; 
  phone: string; 
  image: string;  // Số dư owner
  // Thêm các trường khác nếu cần
}


export type TabType = "info" | "menu" | "book";

