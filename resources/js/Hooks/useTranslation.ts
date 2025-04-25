import { useState, useEffect } from 'react';
import { useLanguage } from '@/Providers/LanguageProvider';
import { TranslationService, LanguageCode } from '@/Services/TranslationService';

export const useTranslation = (text: string) => {
    const { language } = useLanguage();
    const [translatedText, setTranslatedText] = useState(text);
    const [isLoading, setIsLoading] = useState(false);

    useEffect(() => {
        const translateText = async () => {
            console.log('Language changed:', language);
            console.log('Current text:', text);

            if (language === 'id') {
                console.log('Language is ID, using original text');
                setTranslatedText(text);
                return;
            }

            try {
                setIsLoading(true);
                console.log('Starting translation...');
                const translated = await TranslationService.translate(text, 'id', language);
                console.log('Translation complete:', translated);
                setTranslatedText(translated);
            } catch (error) {
                console.error('Translation error in hook:', error);
                setTranslatedText(text);
            } finally {
                setIsLoading(false);
            }
        };

        translateText();
    }, [text, language]);

    return translatedText;
}; 