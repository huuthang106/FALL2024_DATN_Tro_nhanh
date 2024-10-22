import React, { useMemo, useState } from "react";
import { useRecoilValue } from "recoil";
import { Box, Page, Text, Button } from "zmp-ui";
import BookingItem from "../components/book/booking";
import { bookingsState } from "../state";
import { useNavigate } from "react-router-dom"; // Sử dụng useNavigate thay vì useHistory

function CalendarPage() {
  const navigate = useNavigate(); // Sử dụng useNavigate
  const allBookings = useRecoilValue(bookingsState);

  const vipBookings = useMemo(() => {
    return allBookings.filter((b) => b.has_vip_badge !== 0);
  }, [allBookings]);

  const allLandlords = useMemo(() => {
    return allBookings;
  }, [allBookings]);

  const [visibleCount, setVisibleCount] = useState(5); // State để quản lý số lượng hiển thị

  const handleShowMore = () => {
    setVisibleCount((prevCount) => prevCount + 10); // Tăng số lượng hiển thị
  };

  return (
    <Page className="min-h-0" >
      <div className="container mx-auto px-2">
        <Text size="large" className="font-semibold mb-3 mt-4 px-4" style={{ color: '#333333' }}>
          Chủ trọ nổi bật
        </Text>
        <div className="overflow-auto snap-x snap-mandatory scroll-p-4 no-scrollbar mb-4">
          {vipBookings.length === 0 ? (
            <Box className="text-center" mt={10} style={{ color: '#333333' }}>
              Không có chủ trọ nổi bật
            </Box>
          ) : (
            <Box m={0} pr={4} pb={2} flex className="w-max">
              {vipBookings.map((booking) => (
                <Box
                  key={booking.id}
                  ml={4}
                  mr={0}
                  className="snap-start transition-transform duration-300 transform hover:scale-105"
                  style={{ width: "calc(80vw - 80px)" }}
                >
                  <BookingItem
                    booking={booking}
                    onClick={() => navigate(`/booking/${booking.id}`)} // Sử dụng navigate để điều hướng
                    isFeatured={true}
                  />
                </Box>
              ))}
            </Box>
          )}
        </div>

        <Text size="large" className="font-semibold mb-4 px-4" style={{ color: '#333333' }}>
          Danh sách chủ trọ
        </Text>
        <Box className="" >
          {allLandlords.length === 0 ? (
            <Box className="text-center" mt={1}>
              Chưa có chủ trọ nào
            </Box>
          ) : (
            allLandlords.slice(0, visibleCount).map((booking) => (
              <Box key={booking.id} my={0}  >
                <BookingItem
                  booking={booking}
                  onClick={() => navigate(`/booking/${booking.id}`)} // Sử dụng navigate để điều hướng
                />
              </Box>
            ))
          )}
          {visibleCount < allLandlords.length && (
            <div className="flex justify-center mb-4">
              <Button onClick={handleShowMore} className="show-more-button">
                Xem thêm
              </Button>
            </div>
          )}
        </Box>
      </div>
    </Page>
  );
}

export default CalendarPage;