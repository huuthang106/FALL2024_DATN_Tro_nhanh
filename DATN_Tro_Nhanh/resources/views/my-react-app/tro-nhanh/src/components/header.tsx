import React from "react";
import { useMemo } from "react";
import { useLocation } from "react-router-dom";
import { Header } from "zmp-ui";
import { useRestaurant } from "../hooks";
import { getConfig } from "./config-provider";

function AppHeader() {
  const location = useLocation();

  const restaurant = useRestaurant(
    Number(new URLSearchParams(location.search).get("id"))
  );

  const title = useMemo(() => {
    if (location.pathname === "/calendar") {
      return "Danh sách chủ trọ";
    }
    if (location.pathname === "/booking/:id") {
      return "Chi tiết chủ trọ";
    }
    if (location.pathname === "/restaurant") {
      if (restaurant) {
        return restaurant.name;
      }
    }
    return getConfig((c) => c.app.title);
  }, [location.pathname]);

  
}

export default AppHeader;
