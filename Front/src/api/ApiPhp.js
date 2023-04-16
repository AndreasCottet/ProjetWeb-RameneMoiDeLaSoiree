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
    const response = await Api.post("http://127.0.0.1/api/insert.php?entity=etudiant", form);
    return response;
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

export const connectUser = async (user) => {
    const response = await Api.get("http://127.0.0.1/api/connect.php?email=" + user.email + "&password=" + user.password);
    return response;
}

export const getInscriptionTrajetByTrajetId = async (id) => {
  const response = await Api.get("http://127.0.0.1/api/select.php?entity=inscriptionTrajet&idTrajet=" + id);
  return response;
}

export const subscribeTrajet = async (form) => {
  const response = await Api.post("http://127.0.0.1/api/insert.php?entity=inscriptionTrajet", form)
  return response;
}

export const deleteInscriptionTrajet = async (form) => {
  const response = await Api.post("http://127.0.0.1/api/delete.php?entity=inscriptionTrajet", form)
}

export const getLieu = async () => {
  const response = await Api.get("http://127.0.0.1/api/select.php?entity=lieu");
  return response;
}

export const getLieuById = async (id) => {
  const response = await Api.get("http://127.0.0.1/api/select.php?entity=lieu&id=" + id);
  return response;
}

export const postLieu = async (form) => {
  const response = await Api.post("http://127.0.0.1/api/insert.php?entity=lieu",form)
  return response;
}

export const getEvenement = async (id) => {
  const response = await Api.get("http://127.0.0.1/api/select.php?entity=evenement");
  return response;
}

export const postEvenement = async (form) => {
  const response = await Api.post("http://127.0.0.1/api/insert.php?entity=evenement",form)
  return response;
}

export const getMessage = async (id) => {
  const response = await Api.get("http://127.0.0.1/api/select.php?entity=message&idTrajet=" + id);
  console.log(response)
  return response;
}

export const postMessage = async (form) => {
  const response = await Api.post("http://127.0.0.1/api/insert.php?entity=message",form)
  return response;
}

export const getCommentByTrajetId = async (id) => {
  const response = await Api.get("http://127.0.0.1/api/select.php?entity=commentaireTrajet&idTrajet=" + id);
  console.log(response)
  return response;
}

export const postComment = async (form) => {
  const response = await Api.post("http://127.0.0.1/api/insert.php?entity=commentaireTrajet",form)
  return response;
}

export const getEvaluationByTrajetId = async (id) => {
  const response = await Api.get("http://127.0.0.1/api/select.php?entity=evaluationTrajet&idTrajet=" + id);
  console.log(response)
  return response;
}

export const postEvaluation = async (form) => {
  const response = await Api.post("http://127.0.0.1/api/insert.php?entity=evaluationTrajet",form)
  return response;
}

export const deleteTrajet = async (form) => {
  const response = await Api.post("http://127.0.0.1/api/delete.php?entity=trajet",form)
  return response;
}



