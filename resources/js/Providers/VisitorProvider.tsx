import axios from 'axios'
import React, { createContext, useEffect, useState } from 'react'

type VisitorData = {
    ip: string
    userAgent: string
}

type VisitorContextType = {
    visitorData: VisitorData
    visitorCount: number
}

const VisitorContext = createContext<VisitorContextType | undefined>(undefined)

export function VisitorProvider({ children }: { children: React.ReactNode }) {
    const [visitorData, setVisitorData] = useState<VisitorData>({
        ip: '',
        userAgent: ''
    })
    const [visitorCount, setVisitorCount] = useState<number>(0)

    useEffect(() => {
        const fetchVisitorData = async () => {
            try {
                // Fetch IP from an external API
                const ipResponse = await axios.get(
                    'https://api.ipify.org?format=json'
                )
                const userAgent = navigator.userAgent

                setVisitorData({
                    ip: ipResponse.data.ip,
                    userAgent
                })

                const isNewVisitor = localStorage.getItem('visitor') === null

                if (isNewVisitor) {
                    localStorage.setItem('visitor', 'visited')
                    setVisitorCount(prev => prev + 1)
                }
            } catch (error) {
                console.error('Error fetching visitor data:', error)
            }
        }

        fetchVisitorData()
    }, [])
    return React.createElement(
        VisitorContext.Provider,
        { value: { visitorCount, visitorData } },
        children
    )
}

export function useVisitor() {
    const context = React.useContext(VisitorContext)
    if (context === undefined) {
        throw new Error('useVisitor must be used within a VisitorProvider')
    }
    return context
}
