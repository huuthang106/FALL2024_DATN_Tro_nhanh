import React from "react";
import { List, Page, Icon, useNavigate } from "zmp-ui";
import { useRecoilValue } from "recoil";
import { userState } from "../state";

import UserCard from "../components/user-card";

const HomePage = () => {
  const user = useRecoilValue(userState);
  const navigate = useNavigate();
  return (
    <Page className="page">
      <div className="section-container">
        <UserCard user={user.userInfo} />
      </div>
      <div className="section-container">
        <List>
          <List.Item
            onClick={() => navigate("/about")}
            suffix={<Icon icon="zi-arrow-right" />}
          >
            <div>About</div>
          </List.Item>
          <List.Item
            onClick={() => navigate("/user")}
            suffix={<Icon icon="zi-arrow-right" />}
          >
            <div>User</div>
          </List.Item>
        </List>
      </div>
    </Page>
  );
};

export default HomePage;