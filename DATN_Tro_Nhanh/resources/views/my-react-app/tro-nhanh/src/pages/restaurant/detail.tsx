import { createElement, ReactNode } from "react";
import { Box, Button, Icon, Text } from "zmp-ui";
import Distance from "../../components/distance";
import DistrictName from "../../components/district-name";
import { TabType } from "../../models";
import Information from "./information";
import Menu from "./menu";
import Booking from "./booking";
import { useRecoilState, useRecoilValue } from "recoil";
import { currentRestaurantTabState } from "../../state";
import React from "react";
import { useRestaurant } from "../../hooks";
import { categories_State, keywordState, selectedCategoryState } from "../../state";
const apiEndpoint ='https://fd72-14-241-183-136.ngrok-free.app';

function RestaurantDetail() {
  const restaurant = useRestaurant();
  const [currentTab, setCurrentTab] = useRecoilState(currentRestaurantTabState);
  const [selectedDistrict, setSelectedDistrict] = useRecoilState(
    selectedCategoryState
  );
  const caterories = useRecoilValue(categories_State);
  const TabItem = ({
    tab,
    children,
  }: {
    tab: TabType;
    children: ReactNode;
  }) => (
    <Button
      size="small"
      variant={currentTab == tab ? "primary" : "tertiary"}
      onClick={() => setCurrentTab(tab)}
      className="mx-1 flex-none"
    >
      {children}
    </Button>
  );

  if (restaurant) {
    const filteredCategories = caterories.filter((category) =>
      category.id == restaurant.category_id // So sánh với category_id của room hiện tại
    );
  
    const location = {
      lat: parseFloat(restaurant.latitude), // Chuyển đổi latitude thành số
      long: parseFloat(restaurant.longitude), // Chuyển đổi longitude thành số
    };
    const formatCurrency = (amount) => {
      return new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND',
      }).format(amount);
    };
    return (
      <>
        <Box m={5}>
          <div className="relative aspect-video w-full">
            <img
              src={`${apiEndpoint}/assets/images/${restaurant.image_url}`}
              className="absolute w-full h-full object-cover rounded-xl"
            />
          </div>
          <Box
            mx={4}
            className="bg-white rounded-2xl text-center relative restaurant-detail-box"
            p={4}
            style={{ marginTop: -60 }}
          >
            <Text className="font-bold">{restaurant.title}</Text>
            <Text className="text-gray-500">{restaurant.address}</Text>
            <Box flex justifyContent="center" mt={0} py={3}>
              <Button
              
                variant="tertiary"
              >
                <span className="text-primary">
                {filteredCategories.map((category) => (
                    <span key={category.id} className="mr-3">
                      {category.name} {/* Hiển thị tên category */}
                    </span>
                  ))}
                </span>
              </Button>
              <Button
               
                variant="tertiary"
              >
                <span className="text-primary">
                {formatCurrency(restaurant.price)}
                </span>
              </Button>
            </Box>
            <Box flex justifyContent="center" mb={0}>
              {/* <TabItem tab="info">Thông tin</TabItem> */}
              {/* <TabItem tab="menu">Thực đơn</TabItem>
              <TabItem tab="book">Đặt bàn</TabItem> */}
            </Box>
          </Box>
        </Box>
        {createElement(
          { info: Information, menu: Menu, book: Booking }[currentTab],
          { restaurant }
        )}
      </>
    );
  }
  return <></>;
}

export default RestaurantDetail;
