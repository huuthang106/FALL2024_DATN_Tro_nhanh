import React, { useState } from "react";
import { useRecoilState, useRecoilValue } from "recoil";
import { Button, Input } from "zmp-ui";
import { categories_State, keywordState, selectedCategoryState } from "../state";

function Inquiry() {
  const [localKeyword, setLocalKeyword] = useState("");

  const [keyword, setKeyword] = useRecoilState(keywordState);

  return (
    <Input.Search
      value={keyword}
      onChange={(e) => setKeyword(e.target.value)}
      className="inquiry my-4 h-8 border-none bg-white"
      placeholder="Tìm kiếm"
    />
  );
}

export function QuickFilter() {
  const [selectedDistrict, setSelectedDistrict] = useRecoilState(
    selectedCategoryState
  );
  const caterories = useRecoilValue(categories_State);

  return (
    <div className="overflow-auto no-scrollbar snap-x snap-mandatory mt-4">
      <div className="flex w-max">
        <Button
          onClick={() => setSelectedDistrict(0)}
          size="small"
          type="highlight"
          variant={!selectedDistrict ? "primary" : "secondary"}
          className="mr-3 snap-start"
        >
          Tất cả
        </Button>
        {caterories.map((category) => (
          <Button
            key={category.id}
            size="small"
            type="highlight"
            variant={selectedDistrict === category.id ? "primary" : "secondary"}
            className="mr-3 snap-start"
            onClick={() => setSelectedDistrict(category.id)}
          >
            {category.name}
          </Button>
        ))}
      </div>
    </div>
  );
}

export default Inquiry;
