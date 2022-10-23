import axios from "axios";

class ApiService {
  async getAssignmentHistory(id) {
    let assignmentHistory = [];

    const resp = await axios.get(
      `http://127.0.0.1:8000/api/v1/assignations?vehicleId[eq]=${id}&includeDrivers=true`
    );
    assignmentHistory = resp.data.data;
    return assignmentHistory;
  }

  async getVehicles() {
    let vehicles = [];

    const resp = await axios.get("http://127.0.0.1:8000/api/v1/vehicles");
    vehicles = resp.data.data;
    return vehicles;
  }

  async getDrives() {
    let drives = [];

    const resp = await axios.get("http://127.0.0.1:8000/api/v1/drivers");
    drives = resp.data.data;
    return drives;
  }
}

export const $api = {
  apiService: new ApiService(),
};
