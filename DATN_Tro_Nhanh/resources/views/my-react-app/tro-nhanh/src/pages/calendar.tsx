import React, { useMemo, useState } from "react";
import { useRecoilValue } from "recoil";
import { Box, Page, Tabs } from "zmp-ui";
import BookingItem from "../components/book/booking";
import BookingDetail from "./booking-detail";
import { bookingsState } from "../state";

const labels = {
  upcoming: "Danh sách chủ trọ",
};

function CalendarPage() {
  const [status, setStatus] = useState<"upcoming" | "finished">("upcoming");
  const [selectedBooking, setSelectedBooking] = useState(null);
  const [visible, setVisible] = useState(false);
  const allBookings = useRecoilValue(bookingsState);

  const bookings = useMemo(() => {
    const startOfToday = new Date();
    startOfToday.setHours(0, 0, 0, 0);
    return allBookings.filter((b) => {
      if (status === "finished") {
        return b.bookingInfo && b.bookingInfo.date < startOfToday;
      } else {
        return !b.bookingInfo || b.bookingInfo.date >= startOfToday;
      }
    });
  }, [status, allBookings]);

  return (
    <Page className="min-h-0">
      <Tabs activeKey={status} onChange={(key) => setStatus(key as any)}>
        {["upcoming", "finished"].map((tabStatus) => (
        <Tabs.Tab key={tabStatus} label={labels[tabStatus]}>
        {bookings.length === 0 ? (
          <Box className="text-center" mt={10}>
           Chưa có chủ trọ nào
           
          </Box>
        ) : (
          <>
            {bookings.map((booking) => (
              <Box key={booking.id} my={4}>
                <BookingItem
                  booking={booking}
                  onClick={() => {
                    setSelectedBooking(booking);
                    setVisible(true);
                  }}
                />
              </Box>
            ))}
          </>
        )}
      </Tabs.Tab>
        ))}
      </Tabs>
      {selectedBooking && visible && (
        <BookingDetail
          booking={selectedBooking}
          onClose={() => setVisible(false)} // Đóng BookingDetail khi cần
        />
      )}
    </Page>
  );
}

export default CalendarPage;