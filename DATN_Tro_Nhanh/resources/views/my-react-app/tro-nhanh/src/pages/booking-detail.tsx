import React from "react";
import { Box, Button, Page, Text, Icon } from "zmp-ui";
import { useParams, useNavigate } from "react-router-dom";
import { useRecoilValue } from "recoil";
import { bookingsState } from "../state";
const apiEndpoint = 'https://tronhanh.com';
const { Title } = Text;

const BookingDetail: React.FC = () => {
  const { id } = useParams<{ id: string }>();
  const navigate = useNavigate();
  const bookings = useRecoilValue(bookingsState);
  const booking = bookings.find((b) => b.id === id);

  if (!booking) {
    return <Page>Booking not found</Page>;
  }

  const renderStars = (rating: number) => {
    const fullStars = Math.floor(rating);
    const halfStar = rating % 1 >= 0.5 ? 1 : 0;
    const emptyStars = 5 - fullStars - halfStar;

    const starStyle = { fontSize: '14px' };

    return (
      <>
        {[...Array(fullStars)].map((_, index) => (
          <Icon key={`full-${index}`} className="text-yellow-500" icon="zi-star-solid" style={starStyle} />
        ))}
        {halfStar === 1 && <Icon className="text-yellow-500" icon="zi-star-half" style={starStyle} />}
        {[...Array(emptyStars)].map((_, index) => (
          <Icon key={`empty-${index}`} className="text-gray-300" icon="zi-star" style={starStyle} />
        ))}
      </>
    );
  };

  return (
    
    <Page>
      <div className="container mx-auto px-2">
      <Box m={5}>
        <div className="relative aspect-video w-full">
          <img
             src={
              booking.image ? `${apiEndpoint}/assets/images/${booking.image}` : `${apiEndpoint}/assets/images/agent-25.jpg`
            }
            className="absolute w-full h-full object-cover rounded-xl"
            style={{ maxWidth: '100%', marginRight: '16px', height: '100%' }}
          />
        </div>
        <Box
          mx={4}
          className="bg-white rounded-2xl text-center relative"
          p={4}
          style={{ marginTop: -60 }}
        >
          <Title className="font-bold">{booking.name}</Title>
          <Text size="small" className="text-gray-500 mt-3">
            {renderStars(parseFloat(booking.averageRating))} ({booking.totalRatings} đánh giá)
          </Text>
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
              <span className="text-primary">{booking.phone ? booking.phone : "Chưa cập nhật"}</span>
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
              {booking.address ? booking.address : "Chưa cập nhật"}
            </span>
          </Box>
        </Box>
        <Box mx={2} mt={6}>
          <Title className="font-semibold mb-2" size="small">
            Thông tin
          </Title>
          <Box flex mx={0} alignItems="center" justifyContent="space-between">
            <Text size="small" className="text-gray-500">
              Email: {booking.email ? booking.email : "Chưa có email"}
              <br />
              Số phòng: {booking.totalRooms ? booking.totalRooms : "Chưa có phòng"}
              <br />
              Số Khu trọ: {booking.totalZones ? booking.totalZones : "Chưa có khu trọ"}
            </Text>
          </Box>
        </Box>
      </Box>
      <div className="flex-grow"></div>
      <Box className="m-6 mt-4">
        <Button
          onClick={() => navigate(-1)}
          variant="secondary"
          fullWidth
        >
          Quay lại
        </Button>
      </Box>
      </div>
    </Page>
  );
};

export default BookingDetail;