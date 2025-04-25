import React from 'react'
import { useTranslation } from '@/Hooks/useTranslation'

interface TranslationWrapperProps {
    children: string
}

export const TranslationWrapper: React.FC<TranslationWrapperProps> = ({
    children
}) => {
    const translatedText = useTranslation(children)
    return <>{translatedText}</>
}
