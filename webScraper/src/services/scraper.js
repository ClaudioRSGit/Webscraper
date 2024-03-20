import axios from 'axios';

export const scrapPrice = async (link, tag) => {
    try {
        const request = {
            params: {
                link: link,
                tag: tag
            }
        };
        const response = await axios.get('http://localhost:8000/api/scrape', request);
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};