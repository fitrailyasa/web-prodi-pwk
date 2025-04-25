import React from 'react'
import AppLayout from '@/Layouts/AppLayout'
import { Card, CardBody } from '@heroui/react'
import { useTranslation } from '@/Hooks/useTranslation'

interface TimelineEvent {
    id: number
    year: string
    title: string
    description: string
}

interface Props {
    timelineEvents: TimelineEvent[]
    title?: string
}

const Sejarah: React.FC<Props> = ({ timelineEvents, title }) => {
    // Pre-translate all static text
    const titleText = useTranslation(title || 'Sejarah')
    const subtitleText = useTranslation('Sejarah Program Studi PWK ITERA')

    return (
        <AppLayout title={titleText}>
            <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[74vh] max-w-7xl">
                <h2 className="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-4 bg-gradient-to-r text-main-blue-light bg-clip-text">
                    {subtitleText}
                </h2>

                <div className="relative">
                    {/* Timeline line */}
                    <div className="absolute left-0 top-0 h-full w-1 bg-main-green"></div>

                    <div className="space-y-8">
                        {timelineEvents.map(event => (
                            <div key={event.id} className="relative pl-8">
                                {/* Timeline dot */}
                                <div className="absolute left-0 top-0 w-4 h-4 rounded-full bg-main-green transform -translate-x-1/2"></div>

                                <Card className="bg-white border border-gray-200 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                    <CardBody className="p-6">
                                        <div className="flex flex-col gap-1 mb-4">
                                            <span className="text-2xl font-bold text-main-blue-light">
                                                {event.year}
                                            </span>
                                            <h3 className="text-xl font-semibold text-main-blue-light">
                                                {useTranslation(event.title)}
                                            </h3>
                                        </div>
                                        <p className="text-gray-700 leading-relaxed text-justify">
                                            {useTranslation(event.description)}
                                        </p>
                                    </CardBody>
                                </Card>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </AppLayout>
    )
}

export default Sejarah
