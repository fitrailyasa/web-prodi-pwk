import { useState, useEffect } from 'react'
import { useLanguage } from '@/Providers/LanguageProvider'
import { TranslationService } from '@/Services/TranslationService'
import { Document } from '@/types'

export function useTranslatedFomrlayanans(documents: Document[]) {
    const { language } = useLanguage()
    const [translatedDocs, setTranslatedDocs] = useState<Document[]>([])
    const [isLoading, setIsLoading] = useState(true)

    useEffect(() => {
        const translateAll = async () => {
            setIsLoading(true)

            if (language === 'id') {
                setTranslatedDocs(documents)
                setIsLoading(false)
                return
            }

            try {
                const translated = await Promise.all(
                    documents.map(async doc => {
                        const [translatedName, translatedType] =
                            await Promise.all([
                                TranslationService.translate(
                                    doc.name,
                                    'id',
                                    language
                                ),
                                TranslationService.translate(
                                    doc.type,
                                    'id',
                                    language
                                )
                            ])
                        return {
                            ...doc,
                            name: translatedName,
                            type: translatedType
                        }
                    })
                )
                setTranslatedDocs(translated)
            } catch (err) {
                console.error('Translation error:', err)
                setTranslatedDocs(documents) // fallback
            } finally {
                setIsLoading(false)
            }
        }

        if (documents.length > 0) {
            translateAll()
        }
    }, [documents, language])

    return { translatedDocs, isLoading }
}
