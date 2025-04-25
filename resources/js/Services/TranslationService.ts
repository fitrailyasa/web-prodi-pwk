import axios from 'axios';

const LINGVANEX_API_URL = 'https://api-b2b.backenster.com/b1/api/v3/translate';
const LINGVANEX_API_KEY = import.meta.env.VITE_LINGVANEX_API_KEY;

export type LanguageCode = 'id' | 'en';

export const TranslationService = {
    async translate(text: string, from: LanguageCode, to: LanguageCode): Promise<string> {
        try {
            if (!LINGVANEX_API_KEY) {
                console.error('Lingvanex API key is not set. Please check your .env file.');
                return text;
            }

            console.log('Translating:', { text, from, to });
            console.log('API Key:', LINGVANEX_API_KEY ? 'Present' : 'Missing');

            const response = await axios.post(LINGVANEX_API_URL, {
                from: from,
                to: to,
                data: text,
                platform: 'api'
            }, {
                headers: {
                    'Authorization': `Bearer ${LINGVANEX_API_KEY}`,
                    'Content-Type': 'application/json'
                }
            });

            console.log('Translation response:', response.data);
            return response.data.result;
        } catch (error) {
            console.error('Translation error:', error);
            if (axios.isAxiosError(error)) {
                console.error('API Error:', {
                    status: error.response?.status,
                    data: error.response?.data,
                    message: error.message
                });
            }
            return text;
        }
    }
}; 