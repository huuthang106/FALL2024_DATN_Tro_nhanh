import React from "react";
import { FunctionComponent } from "react";
import { Box, Button, Icon, Text } from "zmp-ui";
import { useNavigate } from "react-router-dom";
import { Restaurant } from "../models";
import Distance from "./distance";
import DistrictName from "./district-name";
import '../css/style.css';
const apiEndpoint = 'https://tronhanh.com';

const { Title } = Text;

interface RestaurantProps {
  layout: "cover" | "list-item";
  restaurant: Restaurant;
  before?: React.ReactNode;
  after?: React.ReactNode;
  onClick?: (e: React.MouseEvent<HTMLDivElement>) => void;
}

const RestaurantItem: FunctionComponent<RestaurantProps> = ({
  layout,
  restaurant,
  before,
  after,
  onClick,
}) => {
  const navigate = useNavigate();
  const viewDetail = () => {
    navigate({
      pathname: "/restaurant",
      search: new URLSearchParams({
        id: String(restaurant.id),
      }).toString(),
    });
  };
  const location = {
    lat: parseFloat(restaurant.latitude), // Chuyển đổi latitude thành số
    long: parseFloat(restaurant.longitude), // Chuyển đổi longitude thành số
  };
  const formatPriceRange = (rooms) => {
    if (rooms && rooms.length > 0) {
      const prices = rooms.map(room => parseFloat(room.price)).filter(price => !isNaN(price)); // Lấy tất cả giá
      if (prices.length > 0) {
        return prices.map(price => 
          new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price)
        ).join(', '); // Kết hợp các giá thành chuỗi
      }
    }
    return "Giá không có sẵn";
  };
  const MAX_ROOMS_DISPLAY = 3;
  if (layout === "cover") {
    return (
      <div
        onClick={onClick ?? viewDetail}
        className="relative bg-white overflow-hidden p-0"
        style={{ display: 'flex', flexDirection: 'column', width: '100%', minHeight: '200px', borderRadius: '5px' }} // Đặt chiều cao tối thiểu
      >
        <div className="aspect-cinema relative w-full">
          {restaurant.rooms.slice(0, MAX_ROOMS_DISPLAY).map((room, index) => (
            <img
              key={index}
              src={`https://drive.google.com/thumbnail?id=${room.image}`} // Đường dẫn ảnh mới
              className="absolute w-full h-full object-cover"
              loading="lazy" // Sử dụng lazy loading
            />
          ))}
        </div>
        <Title size="small" className="mt-2 mb-0 mx-2 title-ellipsis" style={{ flexGrow: 1, flexShrink: 1, color: '#333333' }}>
          {restaurant.name}
        </Title>
        <Box flex mt={0} mb={2} style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center' }}>
          <span className="text-black-500 mx-2 font-semibold" style={{ color: '#333333' }}>
            {formatPriceRange(restaurant.rooms)}
          </span>
          <div className="ml-auto">
            <Button
              prefixIcon={
                <Icon className="text-gray-400" icon="zi-unhide" />
              }
              size="small"
              className="button-container"
              variant="tertiary"
            >
              <span className="text-gray-500 font-semibold">
                {restaurant.view}
              </span>
            </Button>
          </div>
        </Box>
      </div>
    );
  }
  return (
    <div
      onClick={onClick ?? viewDetail}
      className="bg-white overflow-hidden p-0 m-0"
      style={{ height: '130px', borderRadius: '5px', margin: '0' }} // Thêm borderRadius và boxShadow
    >
      <Box ml={2} mt={2} flex>
        <div className="flex-none aspect-card relative w-32" style={{ height: '115px', borderRadius: '10px', overflow: 'hidden' }}>
        <img
            src={`https://drive.google.com/thumbnail?id=${restaurant.rooms[0].image}`} // Đường dẫn ảnh mới
            className="absolute w-full h-full object-cover"
          />
        </div>
        <Box mr={1} className="min-w-0">
          {before}
          <Title size="small" className="title-list" style={{ color: '#333333 ' }}>{restaurant.name}</Title>
          {after}
          <Box className="flex justify-between items-center">
            <span className="text-black-500 font-semibold  price-list" style={{ fontSize: '1.0rem', color: '#333333' }}>
            {formatPriceRange(restaurant.rooms)}  
            </span>
            <div className="ml-auto">
              <Button
                prefixIcon={
                  <Icon className="text-gray-400" icon="zi-unhide" />
                }
                size="small"
                className="button-container"
                variant="tertiary"
              >
                <span className="text-gray-500 font-semibold">
                  {restaurant.view}
                </span>
              </Button>
            </div>
          </Box>
          <Box mx={0} mt={0}>
            <span className="address text-gray-500" style={{ color: '#757575 ' }}>
              {restaurant.address}
            </span>
          </Box>
        </Box>
      </Box>
    </div>
  );
};

export default RestaurantItem;
