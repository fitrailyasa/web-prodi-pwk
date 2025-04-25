import { useState, useEffect } from 'react'
import { usePage } from '@inertiajs/react'
import AppLayout from '@/Layouts/AppLayout'
import {
    Card,
    CardHeader,
    CardBody,
    CardFooter,
    Divider,
    Image,
    Button,
    Tabs,
    Tab,
    Chip,
    Spinner,
    Accordion,
    AccordionItem,
    Table,
    TableHeader,
    TableColumn,
    TableBody,
    TableRow,
    TableCell,
    Link,
    Badge
} from '@heroui/react'
import { motion } from 'framer-motion'

interface Modul {
    id: number
    name: string
    file: string
    img: string
}

interface Matkul {
    id: number
    name: string
    code: string
    credits: number
    semester: number
    moduls: Modul[]
}

interface Jadwal {
    id: number
    matkul_id: number
    class: string
    room: string
    lecture: string
    day: string
    start_time: string
    end_time: string
}

interface PageProps {
    matkuls: Matkul[]
    jadwals: Jadwal[]
}

export default function Kurikulum() {
    const { props } = usePage<{ props: PageProps }>()
    const matkuls: Matkul[] = Array.isArray(props.matkuls) ? props.matkuls : []
    const jadwals: Jadwal[] = Array.isArray(props.jadwals) ? props.jadwals : []
    const [selectedSemester, setSelectedSemester] = useState<number>(1)
    const [isLoading, setIsLoading] = useState(true)

    useEffect(() => {
        if (matkuls.length > 0 && jadwals.length > 0) {
            setIsLoading(false)
        }
    }, [matkuls, jadwals])

    const filteredMatkuls = matkuls.filter(
        (matkul: Matkul) => matkul.semester === selectedSemester
    )

    const days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
    const filteredJadwals = jadwals.filter((jadwal: Jadwal) =>
        matkuls.some(
            (matkul: Matkul) =>
                matkul.id === jadwal.matkul_id &&
                matkul.semester === selectedSemester
        )
    )

    if (isLoading) {
        return (
            <div className="flex justify-center items-center min-h-screen">
                <Spinner size="lg" />
            </div>
        )
    }

    const renderJadwalRows = () => {
        return days.flatMap(day => {
            const dayJadwals = filteredJadwals.filter(
                (jadwal: Jadwal) => jadwal.day === day
            )
            if (dayJadwals.length === 0) return []

            return dayJadwals
                .map((jadwal: Jadwal) => {
                    const matkul = matkuls.find(
                        (m: Matkul) => m.id === jadwal.matkul_id
                    )
                    if (!matkul) return null

                    return (
                        <TableRow key={jadwal.id}>
                            <TableCell>
                                <Badge
                                    color="primary"
                                    variant="flat"
                                    className="bg-[#003366] text-white text-xs sm:text-sm"
                                >
                                    {day}
                                </Badge>
                            </TableCell>
                            <TableCell className="font-medium text-[#003366] line-clamp-1">
                                {matkul.name}
                            </TableCell>
                            <TableCell>{jadwal.class}</TableCell>
                            <TableCell>{jadwal.room}</TableCell>
                            <TableCell className="line-clamp-1">
                                {jadwal.lecture}
                            </TableCell>
                            <TableCell>
                                <Badge
                                    color="secondary"
                                    variant="flat"
                                    className="bg-[#FFD700] text-[#003366] text-xs sm:text-sm"
                                >
                                    {jadwal.start_time} - {jadwal.end_time}
                                </Badge>
                            </TableCell>
                        </TableRow>
                    )
                })
                .filter((row): row is JSX.Element => row !== null)
        })
    }

    return (
        <AppLayout title="Kurikulum Program Studi">
            <div className="container mx-auto px-2 sm:px-4 py-4 sm:py-8">
                {/* Hero Section */}
                <motion.div
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.5 }}
                    className="text-center mb-8 sm:mb-12 px-2 sm:px-0"
                >
                    <h1 className="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-4 bg-gradient-to-r from-[#003366] to-[#FFD700] bg-clip-text text-transparent">
                        Kurikulum Program Studi
                    </h1>
                    <p className="text-sm sm:text-base md:text-lg text-gray-600 max-w-2xl mx-auto">
                        Informasi lengkap mengenai mata kuliah, modul
                        pembelajaran, dan jadwal perkuliahan Program Studi
                        Perencanaan Wilayah dan Kota
                    </p>
                </motion.div>

                {/* Semester Selection */}
                <motion.div
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.5, delay: 0.2 }}
                    className="mb-6 sm:mb-8"
                >
                    <div className="w-full overflow-x-auto no-scrollbar">
                        <div className="min-w-[800px] flex justify-center">
                            <Tabs
                                selectedKey={selectedSemester.toString()}
                                onSelectionChange={key =>
                                    setSelectedSemester(Number(key))
                                }
                                variant="bordered"
                                classNames={{
                                    tabList:
                                        'gap-2 sm:gap-4 md:gap-6 w-full justify-center',
                                    tab: 'px-3 sm:px-4 md:px-6 py-1 sm:py-2 text-sm sm:text-base md:text-lg font-medium flex-1 max-w-[120px]',
                                    cursor: 'bg-[#003366]',
                                    base: 'w-full'
                                }}
                            >
                                {[1, 2, 3, 4, 5, 6, 7, 8].map(semester => (
                                    <Tab
                                        key={semester}
                                        title={`Semester ${semester}`}
                                    />
                                ))}
                            </Tabs>
                        </div>
                    </div>
                </motion.div>

                {/* Mata Kuliah Section */}
                <motion.div
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.5, delay: 0.4 }}
                    className="mb-8 sm:mb-12 px-2 sm:px-0"
                >
                    <div className="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 sm:mb-6 gap-2 sm:gap-0">
                        <h2 className="text-xl sm:text-2xl font-bold text-[#003366]">
                            Mata Kuliah Semester {selectedSemester}
                        </h2>
                        <Badge
                            color="primary"
                            variant="flat"
                            className="bg-[#003366] text-white text-sm sm:text-base"
                        >
                            {filteredMatkuls.length} Mata Kuliah
                        </Badge>
                    </div>
                    <div className="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                        {filteredMatkuls.map(
                            (matkul: Matkul, index: number) => (
                                <motion.div
                                    key={matkul.id}
                                    initial={{ opacity: 0, y: 20 }}
                                    animate={{ opacity: 1, y: 0 }}
                                    transition={{
                                        duration: 0.5,
                                        delay: 0.1 * index
                                    }}
                                    className="w-full"
                                >
                                    <Card className="w-full hover:shadow-lg transition-shadow duration-300 border border-[#003366]/20">
                                        <CardHeader className="flex gap-3 bg-gradient-to-r from-[#003366] to-[#FFD700] p-3 sm:p-4">
                                            <div className="flex flex-col">
                                                <p className="text-sm sm:text-md font-bold text-white line-clamp-2">
                                                    {matkul.name}
                                                </p>
                                                <p className="text-xs sm:text-small text-white/80">
                                                    {matkul.code}
                                                </p>
                                            </div>
                                        </CardHeader>
                                        <Divider />
                                        <CardBody className="p-3 sm:p-4">
                                            <div className="flex flex-wrap items-center gap-2 mb-3 sm:mb-4">
                                                <Badge
                                                    color="primary"
                                                    variant="flat"
                                                    className="bg-[#003366] text-white text-xs sm:text-sm"
                                                >
                                                    {matkul.credits} SKS
                                                </Badge>
                                                <Badge
                                                    color="secondary"
                                                    variant="flat"
                                                    className="bg-[#FFD700] text-[#003366] text-xs sm:text-sm"
                                                >
                                                    Semester {matkul.semester}
                                                </Badge>
                                            </div>
                                            {matkul.moduls &&
                                                matkul.moduls.length > 0 && (
                                                    <Accordion>
                                                        <AccordionItem
                                                            key="modul"
                                                            aria-label="Modul Pembelajaran"
                                                            title="Modul Pembelajaran"
                                                            classNames={{
                                                                title: 'text-xs sm:text-sm font-medium text-[#003366]',
                                                                content:
                                                                    'text-xs sm:text-sm'
                                                            }}
                                                        >
                                                            <div className="flex flex-col gap-2">
                                                                {matkul.moduls.map(
                                                                    (
                                                                        modul: Modul
                                                                    ) => (
                                                                        <Link
                                                                            key={
                                                                                modul.id
                                                                            }
                                                                            href={
                                                                                modul.file
                                                                            }
                                                                            isExternal
                                                                            showAnchorIcon
                                                                            className="text-xs sm:text-sm hover:text-[#003366] transition-colors line-clamp-1"
                                                                        >
                                                                            {
                                                                                modul.name
                                                                            }
                                                                        </Link>
                                                                    )
                                                                )}
                                                            </div>
                                                        </AccordionItem>
                                                    </Accordion>
                                                )}
                                        </CardBody>
                                    </Card>
                                </motion.div>
                            )
                        )}
                    </div>
                </motion.div>

                {/* Jadwal Section */}
                <motion.div
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.5, delay: 0.6 }}
                    className="px-2 sm:px-0"
                >
                    <div className="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 sm:mb-6 gap-2 sm:gap-0">
                        <h2 className="text-xl sm:text-2xl font-bold text-[#003366]">
                            Jadwal Perkuliahan
                        </h2>
                        <Badge
                            color="primary"
                            variant="flat"
                            className="bg-[#003366] text-white text-sm sm:text-base"
                        >
                            Semester {selectedSemester}
                        </Badge>
                    </div>
                    <div className="overflow-x-auto rounded-lg shadow-md">
                        <Table
                            aria-label="Jadwal Perkuliahan"
                            classNames={{
                                wrapper: 'rounded-lg min-w-[800px]',
                                th: 'bg-[#003366] text-white text-xs sm:text-sm',
                                tr: '[&:nth-child(odd)]:bg-white [&:nth-child(even)]:bg-[#003366]/5 hover:bg-[#FFD700]/10',
                                td: 'text-xs sm:text-sm'
                            }}
                        >
                            <TableHeader>
                                <TableColumn className="w-[100px]">
                                    Hari
                                </TableColumn>
                                <TableColumn>Mata Kuliah</TableColumn>
                                <TableColumn className="w-[80px]">
                                    Kelas
                                </TableColumn>
                                <TableColumn className="w-[90px]">
                                    Ruang
                                </TableColumn>
                                <TableColumn className="w-[200px]">
                                    Dosen
                                </TableColumn>
                                <TableColumn className="w-[120px]">
                                    Waktu
                                </TableColumn>
                            </TableHeader>
                            <TableBody>{renderJadwalRows()}</TableBody>
                        </Table>
                    </div>
                </motion.div>
            </div>
        </AppLayout>
    )
}
