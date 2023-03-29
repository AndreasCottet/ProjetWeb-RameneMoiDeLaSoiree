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