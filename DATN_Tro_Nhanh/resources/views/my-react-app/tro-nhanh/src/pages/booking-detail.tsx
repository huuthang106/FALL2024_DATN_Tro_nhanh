import { FC } from "react";
import { Box, Button, Sheet, Text, Icon } from "zmp-ui";
import React from "react";
import { Booking } from "../models";
import { createPortal } from "react-dom";

const { Title } = Text;

const BookingDetail: FC<{
  booking: Booking;
  onClose: () => void; // Thêm hàm onClose
}> = ({ booking, onClose }) => {
  const googleMapsUrl = `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(booking.address)}`;

  return (
    <>
      {createPortal(
        <Sheet visible={true} onClose={onClose}>
          {booking && (
            <>
              <Box m={5}>
                <div className="relative aspect-video w-full">
                  <img
                    src={booking.image} // Đảm bảo rằng bạn có thuộc tính image trong dữ liệu booking
                    className="absolute w-full h-full object-cover rounded-xl"
                  />
                </div>
                <Box
                  mx={4}
                  className="bg-white rounded-2xl text-center relative"
                  p={4}
                  style={{ marginTop: -60 }}
                >
                  <Title className="font-bold">{booking.name}</Title>
                  <Text className="text-gray-500">{booking.address}</Text>
                  <Box flex justifyContent="center" mt={0} py={3}>
                    <Button variant="tertiary">
                      <span className="text-primary">{booking.email}</span>
                    </Button>
                  
                  </Box>
                </Box>
              </Box>
              <Box mx={2}>
              
              
                <Box mx={2} mt={6}>
                  <Title className="font-semibold mb-2" size="small">
                    Hotline liên hệ
                  </Title>
                  <Box flex mx={0} alignItems="center" justifyContent="space-between">
                    <a onClick={() => openPhone({ phoneNumber: booking.phone })}>
                      <Icon icon="zi-call" className="text-green-500 mr-1" />
                      <span className="text-primary">{booking.phone}</span>
                    </a>
                  </Box>
                </Box>
                <Box mx={2} mt={6}>
                  <Title className="font-semibold mb-2" size="small">
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
                      {booking.address}
                    </span>
                  </Box>
                  
                
                </Box>
              </Box>
              <Box className="m-6 mt-4">
                <Button
                  onClick={onClose} // Đóng khi nhấn nút
                  variant="secondary"
                  fullWidth
                >
                  Huỷ
                </Button>
              </Box>
            </>
          )}
        </Sheet>,
        document.body
      )}
    </>
  );
};

export default BookingDetail;