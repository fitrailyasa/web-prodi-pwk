import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import EvenContainer from '@/Components/home/EvenContainer'
import { eventsConstants } from '@/Constants'
import AppLayout from '@/Layouts/AppLayout'
import { evenByBulanType, eventTypes } from '@/types/PropsType'
import { Button, DateRangePicker, Link } from '@nextui-org/react'
import React from 'react'

const KalenderAkademik: React.FC = () => {
    const evenByBulam = eventsConstants.reduce(
        (acc: evenByBulanType[], item: eventTypes) => {
            const bulan = new Date(item.date).toLocaleString('id-ID', {
                month: 'long'
            })
            const index = acc.findIndex(item => item.bulan === bulan)
            if (index === -1) {
                acc.push({
                    bulan,
                    events: [item]
                })
            } else {
                acc[index].events.push(item)
            }
            return acc
        },
        []
    )

    return (
        <AppLayout title="Kalender Akademik">
            <div className="container mx-auto px-4 py-3 relative">
                <SectionTrigerScroll
                    id={'visi'}
                    macControlCenter
                    className="mt-10 bg-white p-5 rounded-3xl shadow-xl"
                >
                    <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                        Even Akademik 2024
                    </h2>

                    <div className=" mb-3 py-2 flex justify-end">
                        <div className="flex justify-end items-center gap-5 w-1/2">
                            <DateRangePicker
                                key={'outside-left'}
                                className="w-1/2"
                                visibleMonths={2}
                                labelPlacement={'outside-left'}
                            />
                            <Button className="bg-main-green font-semibold text-white inline-block">
                                filter
                            </Button>
                        </div>
                    </div>

                    {evenByBulam.map((item, index) => (
                        <div key={index} className="w-full py-2">
                            <h3 className="font-bold text-xl py-3">
                                {item.bulan}
                            </h3>
                            <div className="flex flex-wrap gap-3">
                                {item.events.map((event, index) => (
                                    <EvenContainer
                                        key={index}
                                        title={event.title}
                                        date={event.date}
                                        dateStart={event.dateStart}
                                        dateEnd={event.dateEnd}
                                        description={event.description}
                                    />
                                ))}
                            </div>
                        </div>
                    ))}
                </SectionTrigerScroll>
                <SectionTrigerScroll
                    id={'visi'}
                    macControlCenter
                    className="mt-10 bg-white p-5 rounded-3xl shadow-xl"
                >
                    <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                        Kalender Akademik ITERA 2024-2025
                    </h2>
                    <div className="">
                        <Link href="#">
                            <Button className="bg-main-green font-semibold text-white inline-block">
                                Download
                            </Button>
                        </Link>
                    </div>
                </SectionTrigerScroll>
            </div>
        </AppLayout>
    )
}

export default KalenderAkademik
