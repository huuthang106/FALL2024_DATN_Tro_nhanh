import { Box, Page } from "zmp-ui";
import BookingDetail from "../booking-detail";
import React from "react";

function BookingPage() {
  return (
    <Page>
      <BookingDetail />
      <Box height={200}></Box>
    </Page>
  );
}

export default BookingPage;
