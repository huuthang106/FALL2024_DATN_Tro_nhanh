import React, { useMemo, useState, useEffect } from "react";
import { useRecoilValue } from "recoil";
import { Box, Page, Tabs, Spinner } from "zmp-ui";
import BookingItem from "../components/book/booking";
import { bookingsState } from "../state";

const labels = {
  upcoming: "Danh sách chủ trọ",
};

function CalendarPage() {
  const [status, setStatus] = useState<"upcoming" | "finished">("upcoming");
  const [loading, setLoading] = useState(true);
  const allBookings = useRecoilValue(bookingsState);

  useEffect(() => {
    if (allBookings.length > 0) {
      setLoading(false);
    }
  }, [allBookings]);

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
            {loading ? (
              <Box className="text-center" mt={10}>
                <Spinner /> Đang tải dữ liệu...
              </Box>
            ) : bookings.length === 0 ? (
              <Box className="text-center" mt={10}>
                Bạn chưa có booking nào{" "}
                {tabStatus === "upcoming" ? "sắp đến" : "hoàn thành"}!
              </Box>
            ) : (
              <>
                {bookings.map((booking) => (
                  <Box key={booking.id} my={4}>
                    <BookingItem booking={booking} />
                  </Box>
                ))}
              </>
            )}
          </Tabs.Tab>
        ))}
      </Tabs>
    </Page>
  );
}

export default CalendarPage;