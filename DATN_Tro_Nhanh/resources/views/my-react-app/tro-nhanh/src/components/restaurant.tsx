import React from "react";
import { FunctionComponent } from "react";
import { Box, Button, Icon, Text } from "zmp-ui";
import { useNavigate } from "react-router-dom";
import { Restaurant } from "../models";
import Distance from "./distance";
import DistrictName from "./district-name";
const apiEndpoint = 'https://0216-2001-ee0-1b21-3a54-952c-ae20-42de-e7ed.ngrok-free.app';

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
        className="relative bg-white rounded-xl overflow-hidden p-0 restaurant-with-cover"
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
        <Title size="small" className="mt-2 mb-0 mx-4">
          {restaurant.title}
        </Title>
        <Box flex mt={0} mb={2}>
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
          <Button
            prefixIcon={<Icon icon="zi-send-solid" />}
            size="small"
            variant="tertiary"
          >
            <span className="text-gray-500">
              {restaurant.phone}
            </span>
          </Button>
        </Box>
      </div>
    );
  }
  return (
    <div
      onClick={onClick ?? viewDetail}
      className="bg-white rounded-xl overflow-hidden p-0 restaurant-with-cover"
    >
      <Box m={0} flex>
        <div className="flex-none aspect-card relative w-32">
          <img
            src={`${apiEndpoint}/assets/images/${restaurant.image_url}`}
            className="absolute w-full h-full object-cover rounded-xl"
          />
        </div>
        <Box my={4} mx={5} className="min-w-0">
          {before}
          <Title size="small">{restaurant.title}</Title>
          {after}
          <Box mx={0} mb={0} flex>
            <Button
              prefixIcon={
                <Icon className="text-gray-400" icon="zi-unhide" />}
              size="small"
              className="pl-0"
              variant="tertiary"
            >
              <span className="text-gray-500 font-semibold">
                {restaurant.view}
              </span>
            </Button>
            {/* <Button
              prefixIcon={<Icon icon="zi-send-solid" />}
              size="small"
              variant="tertiary"
            >
              <span className="text-gray-500">
                <Distance location={location} />
              </span>
            </Button> */}
          </Box>
        </Box>
      </Box>
    </div>
  );
};

export default RestaurantItem;
