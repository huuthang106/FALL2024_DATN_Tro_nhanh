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
  if (layout === "cover") {
    return (
      <div
        onClick={onClick ?? viewDetail}
        className="relative bg-white overflow-hidden p-0 restaurant-with-cover"
        style={{ display: 'flex', flexDirection: 'column', width: '100%', minHeight: '200px' }} // Đặt chiều cao tối thiểu
      >
        <div className="aspect-cinema relative w-full">
          <img
            src={`${apiEndpoint}/assets/images/${restaurant.image_url}`}
            className="absolute w-full h-full object-cover"
          />
        </div>
        {/* <div className="absolute left-3 top-3 py-1 px-3 space-x-1 flex items-center font-semibold text-sm text-white bg-primary rounded-full">
          <Icon icon="zi-star-solid" className="text-yellow-400" size={16} />
          <span>{restaurant.rating}</span>
        </div> */}
        <Title size="small" className="mt-2 mb-0 mx-2 title-ellipsis" style={{ flexGrow: 1, flexShrink: 1 }}>
          {restaurant.title}
        </Title>
        <Box flex mt={0} mb={2} style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center' }}>
          {/* <Button
            className="text-red-500"
            prefixIcon={
              <Icon className="text-red-500" icon="zi-location-solid" />
            }
            size="small"
            variant="tertiary"
          >
            <span className="text-gray-500">
            {restaurant.phone}
            </span>
          </Button> */}

          <span className="text-gray-500 mx-2">
            {new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(restaurant.price)}
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
      className="bg-white  overflow-hidden p-0 restaurant-with-cover"
    >
      <Box ml={2} mt={2} flex>
        <div className="flex-none aspect-card relative w-32">
          <img
            src={`${apiEndpoint}/assets/images/${restaurant.image_url}`}
            className="absolute w-full h-full object-cover"
          />
        </div>
        <Box mr={1} className="min-w-0">
          {before}
          <Title size="small" className="title-list">{restaurant.title}</Title>
          {after}
          <Box className="flex justify-between items-center">
            <span className="text-gray-500 font-semibold price-list">
              {new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(restaurant.price)}
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
        </Box>
      </Box>

      <Box mx={2} mt={1} >
        <span className="address text-gray-500">
          {restaurant.address}
        </span> 
      </Box>
    </div>
  );
};

export default RestaurantItem;
