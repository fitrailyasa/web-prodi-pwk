import React, { createContext, useEffect, useState } from "react";

type LanguageOption = 'id' | 'en'

type LanguageProviderProps = {
    children: React.ReactNode;
    defaultLanguage?: LanguageOption;
    StorageKey?: string;
}

type LanguageProviderState = {
    language : LanguageOption
    setLanguage : (Language : LanguageOption ) => void
}

const initialStates : LanguageProviderState = {
    language : 'id',
    setLanguage : () => null
}

const LanguageContext = createContext<LanguageProviderState>(initialStates);

export function LanguageProvider({ children, defaultLanguage = 'id', StorageKey = 'vite-language' }: LanguageProviderProps) {
    const [language, setLanguage] = useState<LanguageOption>(() => {
        const storedLanguage = localStorage.getItem(StorageKey);
        return storedLanguage ? (storedLanguage as LanguageOption) : defaultLanguage;
    });

    useEffect(() => {
        localStorage.setItem(StorageKey, language);
    }, [language]);

    return (
        <LanguageContext.Provider value={{ language, setLanguage }}>
            {children}
        </LanguageContext.Provider>
    );
}
