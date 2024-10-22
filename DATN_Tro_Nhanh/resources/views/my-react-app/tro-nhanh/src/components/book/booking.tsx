import React, { FunctionComponent } from "react";
import { Box, Text, Icon } from "zmp-ui";
import '../../css/style.css';
const { Title } = Text;
const apiEndpoint = 'https://243e-125-235-236-24.ngrok-free.app';

interface BookingProps {
  booking: {
    id: string;
    name: string;
    email: string;
    phone: string;
    image: string;
    has_vip_badge: number;
    averageRating: string;
    totalRatings: number;
  };
  onClick: () => void;
  isFeatured?: boolean;
}

const BookingItem: FunctionComponent<BookingProps> = React.memo(({ booking, onClick, isFeatured }) => {
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
    <div
      onClick={onClick}
      className="bg-white overflow-hidden p-4 mb-4 transition-transform transform hover:scale-105"
      style={{ minWidth: '200px', height: '90%', marginTop: '0px', marginBottom: '3px', borderRadius: '5px' }}
    >
      <Box m={1} flexDirection={isFeatured ? "column" : "row"} alignItems="center" style={{ marginTop: '0px' }}>
        <div className={isFeatured ? "w-full overflow-hidden mb-4 featured-booking-card" : "w-1/3 overflow-hidden booking-card"}>
          <img
            src={
              booking.image ? `${apiEndpoint}/assets/images/${booking.image}` : `${apiEndpoint}/assets/images/agent-25.jpg`
            }
            alt={booking.name}
            className="object-cover"
          
          />
        </div>
        <Box className={`min-w-0 ml-1 flex-1 ${isFeatured ? "text-center" : ""}`}>
          <Title size="small" className="font-semibold" style={{ color: '#FF4081' }}>{booking.name}</Title>
          <br />
          <Text size="small" style={{ color: '#616161' }}>
            Số điện thoại: {booking.phone ? booking.phone : "chưa cập nhật"}
          </Text>
          <Box display="flex" alignItems="center" style={{ color: '#4CAF50 ' }}>
            {renderStars(parseFloat(booking.averageRating))} ({booking.totalRatings} đánh giá)
          </Box>
        </Box>
        {booking.has_vip_badge !== 0 && (
          <Icon className="text-yellow-500" icon="" />
        )}
      </Box>
    </div>
  );
});

export default BookingItem;