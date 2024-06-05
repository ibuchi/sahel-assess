import { onMounted, ref, watch } from "vue";
import { http } from "../utils/request";

export function useCompany() {
    const companies = ref([]);
    const selectedCompany = ref([]);

    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    const getCompanies = async () =>
        (companies.value = (await http.get("companies")).data);

    const createCompany = async (formData) => {
        companies.value.data.push(formData);
        await http.post(`companies`, formData).data;
    };

    const updateCompany = async (company) => {
        selectedCompany.value = companies.value.data.find(
            (c) => c.id === company.id
        );
        selectedCompany.value.name = company.name;
        await http.put(`companies/${company.id}`, company).data;
    };

    const deleteComapany = async (companyID) => {
        companies.value.data = companies.value.data.filter(
            (company) => company.id !== companyID
        );
        await http.delete(`companies/${companyID}`).data;
    };

    onMounted(() => {
        getCompanies();
    });

    return {
        companies,
        createCompany,
        getCompanies,
        updateCompany,
        deleteComapany,
    };
}
