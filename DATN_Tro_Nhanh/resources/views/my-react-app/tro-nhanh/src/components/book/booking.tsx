import React, { FunctionComponent } from "react";
import { Box, Text, Icon } from "zmp-ui";

const { Title } = Text;
const apiEndpoint = 'https://tronhanh.com';

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
      className="bg-white rounded-xl shadow-md overflow-hidden p-4 mb-4 transition-transform transform hover:scale-105"
      style={{ minWidth: '250px', marginRight: '16px', height: '100%' }}
    >
      <Box m={0} flexDirection={isFeatured ? "column" : "row"} alignItems="center">
        <div className={isFeatured ? "w-full overflow-hidden mb-4" : "w-1/3 overflow-hidden"}>
          <img
            src={
              booking.image ? `${apiEndpoint}/assets/images/${booking.image}` : `${apiEndpoint}/assets/images/agent-25.jpg`
            }
            alt={booking.name}
            className="object-cover"
            style={{ width: '100%', height: 'auto', maxWidth: '300px', maxHeight: '200px' }}
          />
        </div>
        <Box className={`min-w-0 ml-3 flex-1 ${isFeatured ? "text-center" : ""}`}>
          <Title size="medium" className="font-semibold">{booking.name}</Title>
          <br />
          <Text size="small" className="text-gray-500">
            Số điện thoại: {booking.phone ? booking.phone : "chưa cập nhật"}
          </Text>
          <Box display="flex" alignItems="center">
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