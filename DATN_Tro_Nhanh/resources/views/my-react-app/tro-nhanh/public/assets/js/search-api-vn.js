const apiUrl = "https://vietnam-administrative-division-json-server-swart.vercel.app";
const apiEndpointDistrict = apiUrl + '/district/?idProvince=';
const apiEndpointCommune = apiUrl + '/commune/?idDistrict=';

async function getDistrict(idProvince) {
    try {
        const { data: districtList } = await axios.get(apiEndpointDistrict + idProvince);
        return districtList;
    } catch (error) {
        console.error('Lỗi khi lấy danh sách quận/huyện:', error);
        return [];
    }
}

async function getCommune(idDistrict) {
    try {
        const { data: communeList } = await axios.get(apiEndpointCommune + idDistrict);
        return communeList;
    } catch (error) {
        console.error('Lỗi khi lấy danh sách xã/phường:', error);
        return [];
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const cityProvinceSelect = document.querySelector('#city-province');
    const districtTownSelect = document.querySelector('#district-town');
    const wardCommuneSelect = document.querySelector('#ward-commune');

    cityProvinceSelect.addEventListener('change', async function() {
        const selectedProvince = this.value;
        districtTownSelect.innerHTML = '<option value="">Chọn Quận/Huyện...</option>';
        wardCommuneSelect.innerHTML = '<option value="">Chọn Xã/Phường...</option>';

        if (selectedProvince) {
            const districtList = await getDistrict(selectedProvince);
            districtList.forEach(district => {
                if (districts[selectedProvince] && districts[selectedProvince].includes(district.idDistrict)) {
                    districtTownSelect.innerHTML += `<option value="${district.idDistrict}">${district.name}</option>`;
                }
            });
        }

        $('#district-town').selectpicker('refresh');
        $('#ward-commune').selectpicker('refresh');
    });

    districtTownSelect.addEventListener('change', async function() {
        const selectedDistrict = this.value;
        wardCommuneSelect.innerHTML = '<option value="">Chọn Xã/Phường...</option>';

        if (selectedDistrict) {
            const communeList = await getCommune(selectedDistrict);
            communeList.forEach(commune => {
                if (villages[selectedDistrict] && villages[selectedDistrict].includes(commune.idCommune)) {
                    wardCommuneSelect.innerHTML += `<option value="${commune.idCommune}">${commune.name}</option>`;
                }
            });
        }

        $('#ward-commune').selectpicker('refresh');
    });
});