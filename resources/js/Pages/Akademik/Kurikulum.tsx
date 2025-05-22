import { useState, useEffect, useMemo } from 'react'
import { usePage } from '@inertiajs/react'
import AppLayout from '@/Layouts/AppLayout'
import {
    Card,
    CardHeader,
    CardBody,
    Divider,
    Tabs,
    Tab,
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
import { useTranslation } from '@/Hooks/useTranslation'
// import { useLanguage } from '@/Providers/LanguageProvider'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'

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
    semesters: string
    tahun_ajaran: string
}

const createJadwalRows = (
    filteredJadwals: Jadwal[],
    matkuls: Matkul[],
    days: string[],
    dayMapping: Record<string, string>,
    renderFn: (
        jadwal: Jadwal,
        matkul: Matkul,
        translatedDay: string
    ) => React.ReactNode
) => {
    return days.flatMap(translatedDay => {
        const originalDay = Object.entries(dayMapping).find(
            ([_, translated]) => translated === translatedDay
        )?.[0]

        if (!originalDay) return []

        const dayJadwals = filteredJadwals.filter(
            jadwal => jadwal.day === originalDay
        )
        if (dayJadwals.length === 0) return []

        return dayJadwals
            .map(jadwal => {
                const matkul = matkuls.find(m => m.id === jadwal.matkul_id)
                if (!matkul) return null
                return renderFn(jadwal, matkul, translatedDay)
            })
            .filter((row): row is JSX.Element => row !== null)
    })
}

export default function Kurikulum() {
    const { props } = usePage<{ props: PageProps }>()
    // const { language } = useLanguage()
    const [selectedSemester, setSelectedSemester] = useState<number>(1)
    const [isLoading, setIsLoading] = useState(true)

    // Pre-translate all static text
    const translations = {
        title: useTranslation('Kurikulum Program Studi'),
        description: useTranslation(
            'Informasi lengkap mengenai mata kuliah, modul pembelajaran, dan jadwal perkuliahan Program Studi Perencanaan Wilayah dan Kota'
        ),
        semester: useTranslation('Semester'),
        mataKuliah: useTranslation('Mata Kuliah'),
        modulPembelajaran: useTranslation('Modul Pembelajaran'),
        jadwalPerkuliahan: useTranslation('Jadwal Perkuliahan'),
        hari: useTranslation('Hari'),
        kelas: useTranslation('Kelas'),
        ruang: useTranslation('Ruang'),
        dosen: useTranslation('Dosen'),
        waktu: useTranslation('Waktu'),
        senin: useTranslation('Senin'),
        selasa: useTranslation('Selasa'),
        rabu: useTranslation('Rabu'),
        kamis: useTranslation('Kamis'),
        jumat: useTranslation('Jumat'),
        sabtu: useTranslation('Sabtu')
    }

    const matkuls: Matkul[] = Array.isArray(props.matkuls) ? props.matkuls : []
    const jadwals: Jadwal[] = Array.isArray(props.jadwals) ? props.jadwals : []

    let semesterArr = [1, 2, 3, 4, 5, 6, 7, 8]

    if (props.semesters === 'ganjil') {
        semesterArr = [1, 3, 5, 7]
    } else if (props.semesters === 'genap') {
        semesterArr = [2, 4, 6, 8]
    }

    useEffect(() => {
        if (matkuls.length > 0 && jadwals.length > 0) {
            setIsLoading(false)
        }
    }, [matkuls, jadwals])

    const filteredMatkuls = useMemo(
        () =>
            matkuls.filter(
                (matkul: Matkul) => matkul.semester === selectedSemester
            ),
        [matkuls, selectedSemester]
    )

    const dayMapping: { [key: string]: string } = {
        Senin: translations.senin,
        Selasa: translations.selasa,
        Rabu: translations.rabu,
        Kamis: translations.kamis,
        Jumat: translations.jumat,
        Sabtu: translations.sabtu
    }

    const days = useMemo(
        () => [
            translations.senin,
            translations.selasa,
            translations.rabu,
            translations.kamis,
            translations.jumat,
            translations.sabtu
        ],
        [translations]
    )

    const filteredJadwals = useMemo(
        () =>
            jadwals.filter((jadwal: Jadwal) =>
                matkuls.some(
                    (matkul: Matkul) =>
                        matkul.id === jadwal.matkul_id &&
                        matkul.semester === selectedSemester
                )
            ),
        [jadwals, matkuls, selectedSemester]
    )

    const allDays = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
    const groupedJadwal = useMemo(() => {
        const initial: Record<string, Jadwal[]> = allDays.reduce(
            (acc, day) => {
                acc[day] = []
                return acc
            },
            {} as Record<string, Jadwal[]>
        )

        const grouped = filteredJadwals.reduce((acc, item) => {
            acc[item.day].push(item)
            return acc
        }, initial)

        allDays.forEach(day => {
            grouped[day].sort((a, b) =>
                a.start_time.localeCompare(b.start_time)
            )
        })

        return grouped
    }, [filteredJadwals, allDays])

    console.log(groupedJadwal)

    const jadwalRows = createJadwalRows(
        filteredJadwals,
        matkuls,
        days,
        dayMapping,
        (jadwal, matkul, translatedDay) => (
            <TableRow key={jadwal.id}>
                <TableCell>
                    <Badge
                        color="primary"
                        variant="flat"
                        className="bg-[#003366] text-white text-xs sm:text-sm"
                    >
                        {translatedDay}
                    </Badge>
                </TableCell>
                <TableCell className="font-medium text-[#003366] line-clamp-1">
                    {matkul.name}
                </TableCell>
                <TableCell>{jadwal.class}</TableCell>
                <TableCell>{jadwal.room}</TableCell>
                <TableCell className="line-clamp-1">{jadwal.lecture}</TableCell>
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
    )

    if (isLoading) {
        return (
            <div className="flex justify-center items-center min-h-screen">
                <Spinner size="lg" />
            </div>
        )
    }

    return (
        <AppLayout title={translations.title}>
            <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[74vh] max-w-7xl">
                {/* Hero Section */}
                <motion.div
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.5 }}
                    className="text-center mb-8 sm:mb-12 px-2 sm:px-0"
                >
                    <h1 className="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-4 bg-gradient-to-r text-main-blue-light bg-clip-text">
                        {translations.title}
                    </h1>
                    <div className="w-full max-w-[100px] h-1 bg-gradient-to-r from-main-blue to-main-green mx-auto rounded-full"></div>
                    <p className="text-sm sm:text-base md:text-lg text-gray-600 max-w-2xl mx-auto mt-2">
                        {translations.description}
                    </p>
                </motion.div>
                {/* Semester Selection */}
                <SectionTrigerScroll id="data" className="mb-6 sm:mb-8">
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
                                        'gap-1 w-full flex justify-between px-2',
                                    tab: 'px-2 py-2 text-sm sm:text-base font-medium min-w-[100px]',
                                    cursor: 'bg-[#003366]',
                                    base: 'w-full'
                                }}
                            >
                                {semesterArr.map(semester => (
                                    <Tab
                                        key={semester}
                                        title={`${translations.semester} ${semester}`}
                                    />
                                ))}
                            </Tabs>
                        </div>
                    </div>
                </SectionTrigerScroll>

                <SectionTrigerScroll
                    id={'tab_list'}
                    className="mb-8 sm:mb-12 px-2 sm:px-0"
                >
                    <div className="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 sm:mb-6 gap-2 sm:gap-0">
                        <h2 className="text-xl sm:text-2xl font-bold text-[#003366]">
                            {translations.mataKuliah} {selectedSemester}
                        </h2>
                        <Badge
                            color="primary"
                            variant="flat"
                            className="bg-[#003366] text-white text-sm sm:text-base"
                        >
                            {filteredMatkuls.length} {translations.mataKuliah}
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
                                                    {translations.semester}{' '}
                                                    {matkul.semester}
                                                </Badge>
                                            </div>
                                            {matkul.moduls &&
                                                matkul.moduls.length > 0 && (
                                                    <Accordion>
                                                        <AccordionItem
                                                            key="modul"
                                                            aria-label={
                                                                translations.modulPembelajaran
                                                            }
                                                            title={
                                                                translations.modulPembelajaran
                                                            }
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
                </SectionTrigerScroll>
                <SectionTrigerScroll
                    id={'jadwal_list'}
                    className="px-2 sm:px-0"
                >
                    <div className="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 sm:mb-6 gap-2 sm:gap-0">
                        <h2 className="text-xl sm:text-2xl font-bold text-[#003366]">
                            {translations.jadwalPerkuliahan}
                        </h2>
                        <Badge
                            color="primary"
                            variant="flat"
                            className="bg-[#003366] text-white text-sm sm:text-base"
                        >
                            {translations.semester} {selectedSemester}
                        </Badge>
                    </div>
                    <div className="overflow-x-auto rounded-lg shadow-md">
                        <Table
                            aria-label={translations.jadwalPerkuliahan}
                            classNames={{
                                wrapper: 'rounded-lg min-w-[800px]',
                                th: 'bg-[#003366] text-white text-xs sm:text-sm',
                                tr: '[&:nth-child(odd)]:bg-white [&:nth-child(even)]:bg-[#003366]/5 hover:bg-[#FFD700]/10',
                                td: 'text-xs sm:text-sm'
                            }}
                        >
                            <TableHeader>
                                <TableColumn className="w-[100px]">
                                    {translations.hari}
                                </TableColumn>
                                <TableColumn>
                                    {translations.mataKuliah}
                                </TableColumn>
                                <TableColumn className="w-[80px]">
                                    {translations.kelas}
                                </TableColumn>
                                <TableColumn className="w-[90px]">
                                    {translations.ruang}
                                </TableColumn>
                                <TableColumn className="w-[400px]">
                                    {translations.dosen}
                                </TableColumn>
                                <TableColumn className="w-[120px]">
                                    {translations.waktu}
                                </TableColumn>
                            </TableHeader>
                            <TableBody>{jadwalRows}</TableBody>
                        </Table>
                    </div>
                </SectionTrigerScroll>
                {/* // grouped jadwal */}
                {allDays.map(day => {
                    const tableRows = createJadwalRows(
                        groupedJadwal[day],
                        matkuls,
                        days,
                        dayMapping,
                        (jadwal, matkul, translatedDay) => (
                            <TableRow key={jadwal.id}>
                                {/* <TableCell>
                                    <Badge
                                        color="primary"
                                        variant="flat"
                                        className="bg-[#003366] text-white text-xs sm:text-sm"
                                    >
                                        {translatedDay}
                                    </Badge>
                                </TableCell> */}
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
                    )
                    return (
                        <SectionTrigerScroll
                            id={`jadwal${day}`}
                            className="pt-10"
                        >
                            <div className="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 sm:mb-6 gap-2 sm:gap-0">
                                <h2 className="text-xl sm:text-2xl font-bold text-[#003366]">
                                    {dayMapping[day]}
                                </h2>
                                <Badge
                                    color="primary"
                                    variant="flat"
                                    className="bg-[#003366] text-white text-sm sm:text-base"
                                >
                                    {translations.semester} {selectedSemester}
                                </Badge>
                            </div>
                            <div className="overflow-x-auto rounded-lg shadow-md">
                                <Table
                                    aria-label={translations.jadwalPerkuliahan}
                                    classNames={{
                                        wrapper: 'rounded-lg min-w-[800px]',
                                        th: 'bg-[#003366] text-white text-xs sm:text-sm',
                                        tr: '[&:nth-child(odd)]:bg-white [&:nth-child(even)]:bg-[#003366]/5 hover:bg-[#FFD700]/10',
                                        td: 'text-xs sm:text-sm'
                                    }}
                                >
                                    <TableHeader>
                                        {/* <TableColumn className="w-[100px]">
                                            {translations.hari}
                                        </TableColumn> */}
                                        <TableColumn>
                                            {translations.mataKuliah}
                                        </TableColumn>
                                        <TableColumn className="w-[80px]">
                                            {translations.kelas}
                                        </TableColumn>
                                        <TableColumn className="w-[90px]">
                                            {translations.ruang}
                                        </TableColumn>
                                        <TableColumn className="w-[400px]">
                                            {translations.dosen}
                                        </TableColumn>
                                        <TableColumn className="w-[120px]">
                                            {translations.waktu}
                                        </TableColumn>
                                    </TableHeader>
                                    <TableBody>{tableRows}</TableBody>
                                </Table>
                            </div>
                        </SectionTrigerScroll>
                    )
                })}
            </div>
        </AppLayout>
    )
}
