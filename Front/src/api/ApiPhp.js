import Api from "../services/Api";

export const getActeurs = async () => {
    try {
        const response = await Api.get("https://acottet001.zzz.bordeaux-inp.fr/api/selectActor.php");
        return response;
    } catch (error) {
      console.error(error);
    }
};