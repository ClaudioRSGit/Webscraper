import { ref } from 'vue';
import axios from 'axios';

export default function useScraping() {
  const price = ref(null);
  const error = ref(null);

  const scrapAndShowPrice = async (link, tag) => {
    try {
      const response = await axios.get('/scrape', {
        params: {
          link: link,
          tag: tag
        }
      });

      price.value = response.data.price;
      console.log('Scraped price from scrap and show:', response.data.price);
      console.log(price.value);
      error.value = null;
    } catch (error) {
      console.error('Error scraping:', error);
      price.value = null;
      error.value = 'Error scraping';
    }
  };

  return { price, error, scrapAndShowPrice };
}

export const testScrap = async (link, tag) => {
    try {
        const request = {
            params: {
                link: link,
                tag: tag
            }
        };
        const response = await axios.get('http://localhost:8000/api/scrape', request);
        console.log('Scraped price from testScrap:', response.data);
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};