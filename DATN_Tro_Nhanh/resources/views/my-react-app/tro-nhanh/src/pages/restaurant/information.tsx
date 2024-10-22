import React, { useState } from "react";

import { Box, Icon, Text } from "zmp-ui";
import Time from "../../components/format/time";
import Day from "../../components/format/day";
import { Restaurant } from "../../models";
import { openPhone } from "zmp-sdk";
const { Title } = Text;
function formatDateTime(dateTime: string) {
  const date = new Date(dateTime); // Chuyển đổi chuỗi thành đối tượng Date
  const day = date.getUTCDate(); // Lấy ngày
  const month = date.getUTCMonth() + 1; // Lấy tháng (tháng bắt đầu từ 0)
  const year = date.getUTCFullYear(); // Lấy năm
  const hours = date.getUTCHours(); // Lấy giờ
  const minutes = date.getUTCMinutes(); // Lấy phút

  // Định dạng thành chuỗi
  return `${day < 10 ? '0' + day : day}/${month < 10 ? '0' + month : month}/${year} ${hours < 10 ? '0' + hours : hours}:${minutes < 10 ? '0' + minutes : minutes}`;
}

function Information({ restaurant }: { restaurant: Restaurant }) {
  const [isExpanded, setIsExpanded] = useState(false);

  const toggleExpand = () => {
    setIsExpanded(!isExpanded);
  };

  const description = isExpanded
    ? restaurant.description
    : restaurant.description.slice(0, 300);
  // Chuyển đổi latitude và longitude thành số
const latitude = parseFloat(restaurant.latitude); // Chuyển đổi latitude thành số
const longitude = parseFloat(restaurant.longitude); // Chuyển đổi longitude thành số
const mapUrl = `https://www.openstreetmap.org/export/embed.html?bbox=${longitude - 0.01}%2C${latitude - 0.01}%2C${longitude + 0.01}%2C${latitude + 0.01}&layer=mapnik&marker=${latitude}%2C${longitude}`;
const googleMapsUrl = `https://www.google.com/maps/dir/?api=1&destination=${latitude},${longitude}&travelmode=driving`;

  return (
    <Box mx={2}>
      <Box mx={2} mt={5}>
        <Title className="font-semibold mb-2" size="small" style={{ color: '#2196F3' }}>
          Thông tin
        </Title>
        <Text>
          {description}
          {restaurant.description.length > 300 && (
            <span onClick={toggleExpand} className="text-blue-500 cursor-pointer">
              {isExpanded ? " Thu gọn" : " Xem thêm"}
            </span>
          )}
        </Text>
      </Box>
      <Box mx={2} mt={6}>
        <Title className="font-semibold mb-2" size="small" style={{ color: '#2196F3' }}>
         Ngày đăng 
        </Title>
        <Box flex mx={0} alignItems="center" justifyContent="space-between">
          <span>
            <Icon icon="zi-clock-1" className="text-green-500 mr-1" />
            {formatDateTime(restaurant.created_at)} {/* Hiển thị ngày đã định dạng */}
            {/* <Time time={restaurant.hours.closing} /> */}
          </span>
          {/* <span>
            <Icon icon="zi-calendar" className="text-secondary mr-1" />
            <Day day={restaurant.days.opening} /> -{" "}
            <Day day={restaurant.days.closing} />
          </span> */}
        </Box>
      </Box>
      <Box mx={2} mt={6}>
        <Title className="font-semibold mb-2" size="small" style={{ color: '#2196F3' }}>
          Hotline liên hệ
        </Title>
        <Box flex mx={0} alignItems="center" justifyContent="space-between">
          <a onClick={() => openPhone({ phoneNumber: restaurant.phone })}>
            <Icon icon="zi-call" className="text-green-500 mr-1" />
            <span className="text-primary">{restaurant.phone}</span>
          </a>
        </Box>
      </Box>
      <Box mx={2} mt={6}>
        <Title className="font-semibold mb-2" size="small" style={{ color: '#2196F3' }}>
          Địa chỉ
        </Title>
        <Box
          flex
          mx={0}
          alignItems="center"
          justifyContent="space-between"
          mb={5}
        >
          <span>
            <Icon icon="zi-location-solid" className="text-red-500 mr-1" />
            {restaurant.address}
          </span>
        </Box>
        
        {/* <iframe
          className="w-full aspect-cinema rounded-xl border-none"
          src={restaurant.map}
          allowFullScreen
          loading="lazy"
          referrerPolicy="no-referrer-when-downgrade"
        ></iframe> */}
         {/* <div id="map" className="w-full aspect-cinema rounded-xl border-none" ></div>  */}
        <Box mt={2}>  <iframe 
          width="100%"
          height="200"
          frameBorder="0"
          scrolling="no"
          src={mapUrl} // Sử dụng URL bản đồ từ biến mapUrl
          style={{ border: 0 }} // Thêm border: 0 để loại bỏ viền
        ></iframe>
        </Box>
       
        
      </Box>
    </Box>
  );
}

export default Information;
