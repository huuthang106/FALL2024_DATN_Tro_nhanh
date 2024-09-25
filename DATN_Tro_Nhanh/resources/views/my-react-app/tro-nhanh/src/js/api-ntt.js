document.addEventListener('DOMContentLoaded', () => {
    // Define API endpoints
    const apiUrl = "https://vietnam-administrative-division-json-server-swart.vercel.app";
    const apiEndpointDistrict = apiUrl + '/district/?idProvince=';
    const apiEndpointCommune = apiUrl + '/commune/?idDistrict=';

    // Function to get districts based on the selected province
    async function getDistrict(idProvince) {
        const { data: districtList } = await axios.get(apiEndpointDistrict + idProvince);
        return districtList;
    }

    // Function to get communes based on the selected district
    async function getCommune(idDistrict) {
        const { data: communeList } = await axios.get(apiEndpointCommune + idDistrict);
        return communeList;
    }

    // Function to load zone data
    async function loadZoneData(provinceId, districtId, communeId) {
        try {
            // Get districts based on the selected province
            const { data: districts } = await axios.get(apiEndpointDistrict + provinceId);
            let districtOptions = "<option value='0'>&nbsp;Chọn Quận/Huyện...</option>";

            districts.forEach(district => {
                districtOptions += `<option value='${district.idDistrict}' ${district.idDistrict == districtId ? 'selected' : ''}>${district.name}</option>`;

            });
            const districtElement = $('#district-town');
            // districtElement.selectpicker('destroy');
            districtElement.html(districtOptions);
            // districtElement.selectpicker('refresh'); // Ensure dropdown is refreshed

            // Get communes based on the selected district
            if (districtId) {
                const { data: communes } = await axios.get(apiEndpointCommune + districtId);
                let communeOptions = "<option value='0'>&nbsp;Chọn Phường/Xã...</option>";

                communes.forEach(commune => {
                    communeOptions += `<option value='${commune.idCommune}' ${commune.idCommune == communeId ? 'selected' : ''}>${commune.name}</option>`;
                });
                const communeElement = $('#ward-commune');
                // communeElement.selectpicker('destroy');
                communeElement.html(communeOptions);
                // communeElement.selectpicker('refresh'); // Ensure dropdown is refreshed
            } else {
                // Reset commune dropdown if no district is selected
                const communeElement = $('#ward-commune');
                // communeElement.selectpicker('destroy');
                communeElement.html("<option value='0'>&nbsp;Chọn Phường/Xã...</option>");
                // communeElement.selectpicker('refresh'); // Ensure dropdown is refreshed
            }
        } catch (error) {
            console.error('Error loading zone data:', error);
        }
    }

    // Event listener for page load
    const { provinceId, districtId, communeId } = window.roomData || {};
    if (provinceId) {
        loadZoneData(provinceId, districtId, communeId);
    }

    // Event listener for province change
    $('#city-province').on('change', async () => {
        const idProvince = $('#city-province').val();

        // Clear commune options
        // $('#ward-commune').selectpicker('destroy');
        // $('#ward-commune').html("<option value='0'>&nbsp;Chọn Phường/Xã...</option>").selectpicker('refresh');

        // Get districts based on the selected province
        const districtList = await getDistrict(idProvince) || [];
        let outputDistrict = "<option value='0'>&nbsp;Chọn Quận/Huyện...</option>";
        districtList.forEach(district => {
            outputDistrict += `<option value='${district.idDistrict}'>${district.name}</option>`;
        });
        const districtElement = $('#district-town');
        // districtElement.selectpicker('destroy');
        districtElement.html(outputDistrict);
        // districtElement.selectpicker('refresh');

        // Reset commune selection
        // $('#ward-commune').selectpicker('val', '0');
    });

    // Event listener for district change
    $('#district-town').on('change', async () => {
        const idDistrict = $('#district-town').val();

        // Get communes based on the selected district
        const communeList = await getCommune(idDistrict) || [];
        let outputCommune = "<option value='0'>&nbsp;Chọn Phường/Xã...</option>";
        communeList.forEach(commune => {
            outputCommune += `<option value='${commune.idCommune}'>${commune.name}</option>`;
        });
        const communeElement = $('#ward-commune');
        // communeElement.selectpicker('destroy');
        communeElement.html(outputCommune);
        // communeElement.selectpicker('refresh');
    });
});
