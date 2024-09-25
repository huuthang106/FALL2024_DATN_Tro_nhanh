import React from "react";
import { Avatar, Box, Text } from "zmp-ui";

const UserCard = ({ user }) => {
  return (
    <Box flex>
      <Avatar
        story="default"
        online
        src={user.avatar.startsWith("http") ? user.avatar : undefined}
      >
        {user.avatar}
      </Avatar>
      <Box ml={4}>
        <Text.Title>{user.name}</Text.Title>
        <Text>{user.id}</Text>
      </Box>
    </Box>
  );
};

export default UserCard;