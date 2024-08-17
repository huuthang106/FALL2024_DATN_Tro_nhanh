const apiUrl = "https://vietnam-administrative-division-json-server-swart.vercel.app";
const apiEndpointDistrict = apiUrl + '/district/?idProvince=';
const apiEndpointCommune = apiUrl + '/commune/?idDistrict=';

async function getDistrict(idProvince) {
    const { data: districtList } = await axios.get(apiEndpointDistrict + idProvince);
    return districtList;
}

async function getCommune(idDistrict) {
    const { data: communeList } = await axios.get(apiEndpointCommune + idDistrict);
    return communeList;
}

document.querySelector('#city-province').addEventListener("change", async () => {
    const idProvince = document.querySelector('#city-province').value;
    let outputCommune = "<option value='0'>&nbspChọn Phường/Xã...</option>";
    document.querySelector('#ward-commune').innerHTML = outputCommune;
    const districtList = await getDistrict(idProvince) || [];
    let outputDistrict = "<option value='0'>&nbspChọn Quận/Huyện...</option>";
    for (let i = 0; i < districtList.length; i++) {
        if (districtList[i].idProvince === idProvince) {
            outputDistrict += `<option value='${districtList[i].idDistrict}'>&nbsp${districtList[i].name}</option>`;
        }
    }
    document.querySelector('#district-town').innerHTML = outputDistrict;
});

document.querySelector('#district-town').addEventListener("change", async () => {
    const idDistrict = document.querySelector('#district-town').value;
    const communeList = await getCommune(idDistrict) || [];
    let outputCommune = "<option value='0'>&nbspChọn Phường/Xã...</option>";
    for (let i = 0; i < communeList.length; i++) {
        if (communeList[i].idDistrict === idDistrict) {
            outputCommune += `<option value='${communeList[i].idCommune}'>&nbsp${communeList[i].name}</option>`;
        }
    }
    document.querySelector('#ward-commune').innerHTML = outputCommune;
});

document.getElementById('city-province').addEventListener('change', updateAddress);
document.getElementById('district-town').addEventListener('change', updateAddress);
document.getElementById('ward-commune').addEventListener('change', updateAddress);

function updateAddress() {
    const cityProvince = document.getElementById('city-province');
    const districtTown = document.getElementById('district-town');
    const wardCommune = document.getElementById('ward-commune');

    const province = cityProvince.options[cityProvince.selectedIndex].text.trim();
    const district = districtTown.options[districtTown.selectedIndex].text.trim();
    const ward = wardCommune.options[wardCommune.selectedIndex].text.trim();

    const isProvinceSelected = cityProvince.selectedIndex > 0;
    const isDistrictSelected = districtTown.selectedIndex > 0;
    const isWardSelected = wardCommune.selectedIndex > 0;

    const addressInput = document.getElementById('address');
    if (isProvinceSelected && isDistrictSelected && isWardSelected) {
        addressInput.value = `${ward}, ${district}, ${province}`;
    } else {
        addressInput.value = '';
    }
}
