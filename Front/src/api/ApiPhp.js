import { data } from "autoprefixer";
import Api from "../services/Api";

export const getActeurs = async () => {
    try {
      const response = await Api.get("https://acottet001.zzz.bordeaux-inp.fr/api/selectActor.php");
      return response;
    } catch (error) {
      console.error(error);
    }
};

export const getTrajetById = async (id) => {
  try {
    const response = await Api.get("https://acottet001.zzz.bordeaux-inp.fr/api/select.php?entity=trajet&id="+id);
    return response;
  } catch (error) {
    console.error(error);
  }
}

export const getZone = async () => {
  try {
    const response = await Api.get("https://acottet001.zzz.bordeaux-inp.fr/api/select.php?entity=zone");
    return response;
  } catch (error) {
    console.error(error);
  }
}

export const getZoneById = async (id) => {
  try {
    const response = await Api.get("https://acottet001.zzz.bordeaux-inp.fr/api/select.php?entity=zone" + id);
    return response;
  } catch (error) {
    console.error(error);
  }
}

export const postPath = async (form) => {
  try {
    const response = await Api.post("http://127.0.0.1/api/insert.php?entity=trajet", form);
    return response;
  } catch (error) {
    console.error(error);
  }
}

export const postUser = async (form) => {
  try {
    const response = await Api.post("http://127.0.0.1/api/insert.php?entity=etudiant", form);
  } catch (error) {
    console.error(error.response.data.error);
    return error.response.data.error;
  }
}