export const fetchData = async (dataApi) => {
    try {
        const response = await fetch(dataApi);
        if (response.ok) {
            return await response.json();
        }
    } catch (error) {
        console.error(error);
    }
};

export const postData = async (data, dataApi) => {
    try {
        const response = await fetch(dataApi, {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        });
        if (response.ok) {
            return await response.json();
        }
    } catch (error) {
        console.error(error);
    }
}