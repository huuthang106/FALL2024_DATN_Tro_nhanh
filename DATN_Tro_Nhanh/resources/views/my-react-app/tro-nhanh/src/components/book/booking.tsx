import React, { FunctionComponent } from "react";
import { Box, Text, Button, Icon } from "zmp-ui";

const { Title } = Text;

interface BookingProps {
  booking: {
    id: string;
    name: string;
    email: string;
    phone: string;
    image: string;
  };
  onClick: () => void;
}

const BookingItem: FunctionComponent<BookingProps> = React.memo(({ booking, onClick }) => {
  return (
    <div
      onClick={onClick}
      className="bg-white rounded-xl shadow-md overflow-hidden p-4 mb-4 transition-transform transform hover:scale-105"
    >
      <Box m={0} flex alignItems="center">
        <div className="flex-none w-16 h-16 rounded-full overflow-hidden mr-4">
          <img
            src={booking.image || 'default-image-url'}
            alt={booking.name}
            className="w-full h-full object-cover"
          />
        </div>
        <Box className="min-w-0 flex-1">
          <Title size="medium" className="font-semibold">{booking.name}</Title>
          <Text size="small" className="text-gray-500">
            <Icon className="text-gray-400 mr-1" icon="zi-mail" />
            {booking.email}
          </Text>
          <Text size="small" className="text-gray-500">
            <Icon className="text-gray-400 mr-1" icon="zi-phone" />
            {booking.phone}
          </Text>
        </Box>
        <Button
          size="small"
          className="ml-auto"
          variant="primary"
        >
          Chi tiết
        </Button>
      </Box>
    </div>
  );
});

export default BookingItem;