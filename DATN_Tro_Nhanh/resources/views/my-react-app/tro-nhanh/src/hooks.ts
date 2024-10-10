import { useMemo } from "react";
import { Booking } from "./models";
import { getConfig } from "./components/config-provider";
import { useRecoilValue } from "recoil";
import { restaurantsState } from "./state";
import { useLocation } from "react-router-dom"; // Sử dụng useLocation nếu có

export const useRestaurant = (id?: number) => {
  const restaurants = useRecoilValue(restaurantsState);
  const location = useLocation(); // Sử dụng useLocation để lấy location
  const restaurant = useMemo(() => {
    const searchParams = new URLSearchParams(location.search);
    const restaurantId = id ? id : Number(searchParams.get("id"));
    return restaurants.find((restaurant) => restaurant.id === restaurantId);
  }, [restaurants, id, location.search]);
  return restaurant;
};

export const useBookingTotal = (booking?: Booking) => {
  const total = useMemo(() => {
    const serviceFee = getConfig((c) => c.template.serviceFee) || 0;
    if (!booking || !booking.cart || !booking.cart.items) return serviceFee;
    return booking.cart.items.reduce(
      (total, item) => total + item.food.price * item.quantity,
      serviceFee
    );
  }, [booking]);
  return [total];
};