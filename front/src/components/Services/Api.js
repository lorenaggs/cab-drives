import axios from "axios";

class ApiService {
  baseUrl = "http://127.0.0.1:8000";

  async getVehicles() {
    let vehicles = [];

    const resp = await axios.get(`${this.baseUrl}/api/v1/vehicles`);
    vehicles = resp.data.data;
    return vehicles;
  }

  async getDrives() {
    let drives = [];

    const resp = await axios.get(`${this.baseUrl}/api/v1/drivers`);
    drives = resp.data.data;
    return drives;
  }

  async getAssignmentHistory(id) {
    let assignmentHistory = [];

    const resp = await axios.get(
      `${this.baseUrl}/api/v1/assignations?vehicleId[eq]=${id}&includeDrivers=true`
    );
    assignmentHistory = resp.data.data;
    return assignmentHistory;
  }

  async sendAssignments(dataDriver) {
    const resp = await axios.post(
      `${this.baseUrl}/api/v1/assignations`,
      dataDriver
    );

    return resp;
  }
}

export const $api = {
  apiService: new ApiService(),
};
