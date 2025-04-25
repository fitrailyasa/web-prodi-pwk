import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import DosenAndStafCard from '@/Components/Profile/DosenCard'
import AppLayout from '@/Layouts/AppLayout'
import { DosenCardType, EmployePageProps } from '@/types'
import React from 'react'

interface SectionProps {
    title: string
    users: DosenCardType[]
    className?: string
}

const Section: React.FC<SectionProps> = ({ title, users, className = '' }) => {
    if (!users || users.length === 0) return null

    return (
        <SectionTrigerScroll
            id="list-berita"
            className={`mt-10 p-5 ${className}`}
        >
            <h2 className="font-bold text-3xl pb-4">{title}</h2>
            <div className="flex flex-wrap gap-7 justify-center">
                {users.map((user, index) => (
                    <DosenAndStafCard key={index} staf={user} />
                ))}
            </div>
        </SectionTrigerScroll>
    )
}

const DosenAndStaf: React.FC<EmployePageProps> = ({
    koordinator,
    employee,
    staff
}) => {
    const pengurus =
        employee?.filter(
            item => item.position && item.position.toLowerCase() !== 'staf'
        ) || []

    const dosen = employee?.filter(item => !item.position) || []

    return (
        <AppLayout title="Dosen & Staf">
            <div className="container mx-auto px-4 py-3 relative">
                {koordinator && (
                    <Section
                        title="Koordinator Program Studi PWK ITERA"
                        users={[koordinator]}
                        className="flex justify-center"
                    />
                )}

                <Section
                    title="Pengurus Program Studi PWK ITERA"
                    users={pengurus}
                />

                <Section title="Dosen Program Studi PWK ITERA" users={dosen} />

                <Section title="Tendik Dan Staf" users={staff || []} />
            </div>
        </AppLayout>
    )
}

export default DosenAndStaf
