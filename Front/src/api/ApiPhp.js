import Api from "../services/Api";

export const getActeurs = async () => {
    try {
      const response = await Api.get(baseUrl + "/selectActor.php");
      return response;
    } catch (error) {
      console.error(error);
    }
};

export const getUser = async (id) => {
  try {
    const response = await Api.get("http://127.0.0.1/api/select.php?entity=etudiant&id="+id);
    return response;
  } catch (error) {
    console.error(error);
  }
};


export const getTrajetById = async (id) => {
  try {
    const response = await Api.get("http://127.0.0.1/api/select.php?entity=trajet&id="+id);
    return response;
  } catch (error) {
    console.error(error);
  }
}

export const getZone = async () => {
  try {
    const response = await Api.get("http://127.0.0.1/api/select.php?entity=zone");
    return response;
  } catch (error) {
    console.error(error);
  }
}

export const getZoneById = async (id) => {
  try {
    const response = await Api.get("http://127.0.0.1/api/select.php?entity=zone" + id);
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

export const getTrajets = async (trajet) => {
  try {
    let searchParams = '';
    for(let key in trajet) {
      if (trajet[key] !== '') {
        searchParams += '&' + key + '=' + trajet[key];
      }
      console.log(searchParams);
    }
    const response = await Api.get("http://127.0.0.1/api/select.php?entity=trajet" + searchParams);
    return response;
  } catch (error) {
    console.error(error);
  }
}