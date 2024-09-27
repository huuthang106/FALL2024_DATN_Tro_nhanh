import React from "react";
import { FunctionComponent, useMemo } from "react";
import { useRecoilValue } from "recoil";
import { categories_State } from "../state";

interface DistrictNameProps {
  id: number;
}

const DistrictName: FunctionComponent<DistrictNameProps> = ({ id }) => {
  const categories = useRecoilValue(categories_State);
  const name = useMemo(() => {
    return categories.find((d) => d.id === id)?.name ?? "";
  }, [id, categories]);
  return <>{name}</>;
};

export default DistrictName;
