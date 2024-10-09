import { atom, selector } from "recoil";
import { getLocation, getUserInfo  } from "zmp-sdk";
import { Booking, Cart, Location, Restaurant, TabType } from "./models";
import { calcCrowFliesDistance } from "./utils/location";

// import { authorize } from "zmp-sdk";

// authorize({
//   scopes: ["scope.userPhonenumber"],
//   success: () => {
//     // xử lý khi gọi api thành công
//     console.log('o');
//   },
//   fail: (error) => {
//     // xử lý khi gọi api thất bại
//     console.log(error);
//   }
// });


const apiEndpoint ='https://fd72-14-241-183-136.ngrok-free.app';
export const restaurantsDataState = atom<Restaurant[]>({
  key: "restaurantsData",
  default: [],
});


export const userState = selector({
  key: "user",
  get: async () => {
    const { userInfo } = await getUserInfo({autoRequestPermission : true});
    console.log('userInfo', userInfo);
    
    return userInfo;
  },
});

export const retryLocationState = atom({
  key: "retryLocation",
  default: 0,
});

export const positionState = selector<Location | undefined>({
  key: "position",
  get: async ({ get }) => {
    try {
      const allow = get(retryLocationState);
      if (allow) {
        const { latitude, longitude, token } = await getLocation({});
        if (token) {
          console.warn(
            "Gửi token này lên server để giải mã vị trí. Xem hướng dẫn tại: https://mini.zalo.me/blog/thong-bao-thay-doi-luong-truy-xuat-thong-tin-nguoi-dung-tren-zalo-mini-app",
            token
          );
          return {
            lat: 10.762701,
            long: 106.681974,
          }; // VNG Campus
        }
        return {
          lat: Number(latitude),
          long: Number(longitude),
        };
      }
    } catch (error) {
      return undefined;
    }
    return undefined;
  },
});

export const restaurantsState = selector<Restaurant[]>({
  key: "restaurants",
  get: async () => {
    try {
      console.log('REACT_APP_API_ENDPOINT:', apiEndpoint);
      const response = await fetch(`${apiEndpoint}/api/get-data-room-listing`, {
        method: 'GET',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json',
          'Content-Type': 'application/json',
          'Ngrok-Skip-Browser-Warning': 'true'
        },
      });

      console.log('Response status:', response.status);
      const data = await response.json(); // Phân tích dữ liệu JSON từ phản hồi
      // console.log('Parsed data:', data.rooms);

      return data.rooms || []; // Trả về mảng rỗng nếu không có nhà hàng
    } catch (error) {
      console.error("Error fetching data:", error);
      return []; // Trả về mảng rỗng nếu có lỗi
    }
  },
});
export const categoriesState = selector({
  key: "categories",
  get: () => ["Pizza", "Pasta", "Salad", "Sandwich", "Drink"],
});

export const menuState = selector({
  key: "menu",
  get: ({ get }) => {
    const categories = get(categoriesState);
    const foods = get(foodsState);
    return {
      categories: categories.map((category, index) => ({
        id: String(index),
        name: category,
        foods: foods.filter((food) => food.categories.includes(category)),
      })),
    };
  },
});

export const foodsState = selector({
  key: "foods",
  get: () => [
    {
      id: 1,
      name: "Daily Pizza",
      price: 400000,
      image:
        "https://images.unsplash.com/photo-1604382355076-af4b0eb60143?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80",
      categories: ["Pizza", "Pasta", "Salad", "Sandwich", "Drink"],
      description: `Pizza Hải Sản Xốt Pesto Với Hải Sản (Tôm, Mực) Nhân Đôi Cùng Với Nấm Trên Nền Xốt Pesto Đặc Trưng, Phủ Phô Mai Mozzarella Từ New Zealand Và Quế Tây.`,
      options: [
        {
          key: "cheese",
          label: "Thêm phô mai",
          selected: true,
        },
        {
          key: "no-onion",
          label: "Không hành",
          selected: false,
        },
        {
          key: "seafood",
          label: "Thêm hải sản",
          selected: false,
        },
      ],
      extras: [
        {
          key: "size",
          label: "Size (Khẩu phần)",
          options: [
            {
              key: "small",
              label: "Nhỏ",
            },
            {
              key: "medium",
              label: "Vừa",
              selected: true,
            },
            {
              key: "large",
              label: "To",
            },
          ],
        },
      ],
    },
    {
      id: 2,
      name: "Prosciutto",
      price: 400000,
      image:
        "https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80",
      categories: ["Pizza"],
      description: `Pizza Hải Sản Xốt Pesto Với Hải Sản (Tôm, Mực) Nhân Đôi Cùng Với Nấm Trên Nền Xốt Pesto Đặc Trưng, Phủ Phô Mai Mozzarella Từ New Zealand Và Quế Tây.`,
      options: [
        {
          key: "cheese",
          label: "Thêm phô mai",
          selected: true,
        },
        {
          key: "no-onion",
          label: "Không hành",
          selected: false,
        },
        {
          key: "seafood",
          label: "Thêm hải sản",
          selected: false,
        },
      ],
      extras: [
        {
          key: "size",
          label: "Size (Khẩu phần)",
          options: [
            {
              key: "small",
              label: "Nhỏ",
            },
            {
              key: "medium",
              label: "Vừa",
              selected: true,
            },
            {
              key: "large",
              label: "To",
            },
          ],
        },
      ],
    },
    {
      id: 3,
      name: "Prosciutto",
      price: 400000,
      image:
        "https://images.unsplash.com/photo-1558030006-450675393462?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1631&q=80",
      categories: ["Pizza", "Drink"],
      description: `Pizza Hải Sản Xốt Pesto Với Hải Sản (Tôm, Mực) Nhân Đôi Cùng Với Nấm Trên Nền Xốt Pesto Đặc Trưng, Phủ Phô Mai Mozzarella Từ New Zealand Và Quế Tây.`,
      options: [
        {
          key: "cheese",
          label: "Thêm phô mai",
          selected: true,
        },
        {
          key: "no-onion",
          label: "Không hành",
          selected: false,
        },
        {
          key: "seafood",
          label: "Thêm hải sản",
          selected: false,
        },
      ],
      extras: [
        {
          key: "size",
          label: "Size (Khẩu phần)",
          options: [
            {
              key: "small",
              label: "Nhỏ",
            },
            {
              key: "medium",
              label: "Vừa",
              selected: true,
            },
            {
              key: "large",
              label: "To",
            },
          ],
        },
      ],
    },
    {
      id: 4,
      name: "Daily Pizza",
      price: 400000,
      image:
        "https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=765&q=80",
      categories: ["Pizza", "Drink"],
      description: `Pizza Hải Sản Xốt Pesto Với Hải Sản (Tôm, Mực) Nhân Đôi Cùng Với Nấm Trên Nền Xốt Pesto Đặc Trưng, Phủ Phô Mai Mozzarella Từ New Zealand Và Quế Tây.`,
      options: [
        {
          key: "cheese",
          label: "Thêm phô mai",
          selected: true,
        },
        {
          key: "no-onion",
          label: "Không hành",
          selected: false,
        },
        {
          key: "seafood",
          label: "Thêm hải sản",
          selected: false,
        },
      ],
      extras: [
        {
          key: "size",
          label: "Size (Khẩu phần)",
          options: [
            {
              key: "small",
              label: "Nhỏ",
            },
            {
              key: "medium",
              label: "Vừa",
            },
            {
              key: "large",
              label: "To",
            },
          ],
        },
      ],
    },
  ],
});

export const keywordState = atom({
  key: "keyword",
  default: "",
});

// export const districtsState = selector({
//   key: "districts",
//   get: () => [
// {
//   id: 1,
//   name: "Quận 1",
// },
// {
//   id: 5,
//   name: "Quận 5",
// },
// {
//   id: 7,
//   name: "Quận 7",
// },
// {
//   id: 13,
//   name: "Thủ Đức",
// },
//   ],
// });
// import { selector } from 'recoil';
// import axios from 'axios';
// import { selector } from 'recoil';

// export const categories_State = selector({
//   key: "caterories",
//   get: async () => {
//     try {

//       console.log('REACT_APP_API_ENDPOINT:', apiEndpoint);
//       // const apiBaseUrl = process.env.REACT_APP_API_BASE_URL;
//       const response = await axios.get(`${apiEndpoint}/api/get-data-category`, {
//         headers: {
//           'X-Requested-With': 'XMLHttpRequest',
//           'Accept': 'application/json',
//           'Content-Type': 'application/json',
//           'Ngrok-Skip-Browser-Warning': 'true'
//         },
//       });
   
//       // console.log('Full response:', JSON.stringify(response, null, 2));
//       // console.log('Response received');
//       // console.log('Response status:', response.status);
//       // console.log('Response headers:', response.headers);
//       // console.log('Full response data:', response.data);

//       // Axios tự động parse JSON, nên không cần gọi response.json()
//       const data = response.data;
//       // console.log('Parsed data:', data);

//       // Đảm bảo bạn đang trả về đúng thuộc tính
//       return data.categories ; // Trả về mảng rỗng nếu không có roomClient
//     } catch (error) {
//       if (axios.isAxiosError(error)) {
//         console.error("Axios error:", error.response?.status, error.response?.data);
//       } else {
//         console.error("Error fetching data:", error);
//       }
//       return [{
//         id: 1,
//         name: "Quận 1",
//       }]; // Trả về mảng rỗng nếu có lỗi
//     }
//   },
// });
export const categories_State = selector({
  key: "caterories",
  get: async () => {
    try {
      console.log('REACT_APP_API_ENDPOINT:', apiEndpoint);
      const response = await fetch(`${apiEndpoint}/api/get-data-category`, {
        method: 'GET',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json',
          'Content-Type': 'application/json',
          'Ngrok-Skip-Browser-Warning': 'true'
        },
      });

      const data = await response.json(); // Phân tích dữ liệu JSON từ phản hồi
      return data.categories; // Trả về mảng rỗng nếu không có roomClient
    } catch (error) {
      console.error("Error fetching data:", error);
      return [{
        id: 1,
        name: "Quận 1",
      }]; // Trả về mảng rỗng nếu có lỗi
    }
  },
});
export const selectedCategoryState = atom({
  key: "selectedDistrict",
  default: 1,
});

export const popularRestaurantsState = selector<Restaurant[]>({
  key: "popularRestaurants",
  get({ get }) {
    const restaurants = get(restaurantsState);
    const keyword = get(keywordState);
    const selectedCategory = get(selectedCategoryState);
    console.log('selectedCategory', restaurants);
    return restaurants

      .filter((restaurant) =>
        restaurant.address.toLowerCase().includes(keyword.toLowerCase())
      )
      .filter(
        (restaurant) =>
          selectedCategory == 0|| restaurant.category_id == selectedCategory
      )       
      
      
  },
});

export const nearestRestaurantsState = selector<Restaurant[]>({
  key: "nearestRestaurants",
  get({ get }) {
    const restaurants = get(restaurantsState);
    const position = get(positionState);
    if (position) {
      return [...restaurants].sort((a, b) => {
        const aDistance = calcCrowFliesDistance(position, a.location);
        const bDistance = calcCrowFliesDistance(position, b.location);
        return aDistance - bDistance;
      });
    }
    return restaurants;
  },
});

export const currentRestaurantTabState = atom<TabType>({
  key: "currentRestaurantTab",
  default: "info",
});

export const cartState = atom<Cart>({
  key: "cart",
  default: {
    items: [],
  },
});

export const totalState = selector({
  key: "total",
  get: ({ get }) => {
    const cart = get(cartState);
    return cart.items.reduce(
      (total, item) => total + item.quantity * item.food.price,
      0
    );
  },
});
export const bookingsState = atom<Booking[]>({
  key: "bookings",
  default: [],
  effects: [
    ({ setSelf }) => {
      const fetchBookings = async () => {
        try {
          const response = await fetch(`${apiEndpoint}/api/get-data-owners-listing`, {
            method: 'GET',
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'Ngrok-Skip-Browser-Warning': 'true'
            },
          });

          if (!response.ok) {
            throw new Error('Network response was not ok');
          }

          const data = await response.json();
          console.log('Fetched bookings:', data.users);

          setSelf(data.users.map(user => ({
            id: user.id.toString(),
            name: user.name,
            email: user.email,
            balance: user.balance,
          })));
        } catch (error) {
          console.error("Error fetching bookings:", error);
          setSelf([]); // Trả về mảng rỗng nếu có lỗi
        }
      };

      fetchBookings();
    },
  ],
});
