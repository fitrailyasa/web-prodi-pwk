import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { ChevronIcon, paginateRenderItem } from '@/Components/Utils/Pagination'
import { useTranslation } from '@/Hooks/useTranslation'
import AppLayout from '@/Layouts/AppLayout'
import {
    Button,
    cn,
    Input,
    Pagination,
    PaginationItemRenderProps,
    PaginationItemType,
    Table,
    TableBody,
    TableCell,
    TableColumn,
    TableHeader,
    TableRow
} from '@heroui/react'

import { ReactElement, useEffect, useMemo, useState } from 'react'
import { Document } from '@/types'
import { useTranslatedFomrlayanans } from '@/Hooks/useTranslatedDocuments'

interface FormLayananProps {
    title?: string
    description?: string
    documents: Document[]
}

function createDocumentRows<T extends Document>(
    documents: T[],
    columnCount: number,
    renderRow: (document: T, index: number) => ReactElement
): ReactElement[] {
    const textNoData = useTranslation(
        'Tidak ada data yang tersedia untuk ditampilkan.'
    )
    if (documents.length < 1) {
        return [
            <TableRow key="no-data">
                <TableCell colSpan={columnCount} className="text-center py-4">
                    {textNoData}
                </TableCell>
            </TableRow>
        ]
    }
    return documents.map((doc, i) => renderRow(doc, i))
}

const FormLayanan: React.FC<FormLayananProps> = ({
    title,
    description,
    documents
}) => {
    const [searchQuery, setSearchQuery] = useState('')
    const [currentPage, setCurrentPage] = useState(1)
    const [debouncedQuery, setDebouncedQuery] = useState('')
    useState<Document[]>(documents ?? [])
    // useState<Document[]>(translatedDoc ?? [])
    const itemsPerPage = 10
    const { translatedDocs } = useTranslatedFomrlayanans(documents)

    const filteredDocuments = useMemo(() => {
        return translatedDocs.filter((doc: Document) =>
            doc.name.toLowerCase().includes(debouncedQuery.toLowerCase())
        )
    }, [translatedDocs, debouncedQuery])

    const totalPages = Math.ceil(filteredDocuments.length / itemsPerPage)

    const paginatedDocuments = useMemo(() => {
        const start = (currentPage - 1) * itemsPerPage
        return filteredDocuments.slice(start, start + itemsPerPage)
    }, [filteredDocuments, currentPage])

    const DataPagination = {
        total: filteredDocuments.length,
        current_page: currentPage,
        last_page: totalPages
    }
    const handleMovePage = (page: number) => {
        setCurrentPage(page)
    }
    useEffect(() => {
        const timeout = setTimeout(() => {
            setDebouncedQuery(searchQuery)
        }, 500) // 500ms debounce
        return () => clearTimeout(timeout) // bersihkan timeout jika input berubah
    }, [searchQuery])

    const translation = {
        download: useTranslation('Download'),
        open: useTranslation('Buka Link')
    }

    const documentRows = createDocumentRows(paginatedDocuments, 4, (doc, i) => (
        <TableRow key={doc.id}>
            <TableCell className="text-center font-medium text-[#003366]">
                {(currentPage - 1) * itemsPerPage + i + 1}
            </TableCell>
            <TableCell className="font-medium text-[#003366] text-wrap">
                {doc.name}
            </TableCell>
            <TableCell>{doc.type}</TableCell>
            <TableCell>
                <a
                    href={doc.link}
                    target="_blank"
                    rel="noopener noreferrer"
                    className={`text-sm underline ${
                        doc.linkType === 'file'
                            ? 'text-blue-600'
                            : 'text-green-600'
                    }`}
                    {...(doc.linkType === 'file' ? { download: true } : {})}
                >
                    {doc.linkType === 'file'
                        ? translation.download
                        : translation.open}
                </a>
            </TableCell>
        </TableRow>
    ))

    return (
        <AppLayout title={useTranslation(title ?? 'Form-Layanan-Mahasiswaan')}>
            <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[74vh] max-w-7xl">
                <SectionTrigerScroll
                    id="Form_Layanan_title"
                    className="text-center mb-8 sm:mb-12 px-2 sm:px-0"
                >
                    <h1 className="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-4 bg-gradient-to-r text-main-blue-light bg-clip-text">
                        {useTranslation(title ?? 'Form-Layanan-Mahasiswaan')}
                    </h1>
                    <div className="w-full max-w-[100px] h-1 bg-gradient-to-r from-main-blue to-main-green mx-auto rounded-full"></div>
                    <p className="text-sm sm:text-base md:text-lg text-gray-600 max-w-2xl mx-auto mt-2">
                        {useTranslation(
                            description ??
                                'Form layanan mahasiswaan adalah sarana untuk mengajukan permohonan layanan kepada pihak universitas. Silakan isi formulir di bawah ini untuk memulai proses permohonan.'
                        )}
                    </p>
                </SectionTrigerScroll>

                <SectionTrigerScroll
                    id="Form_Layanan_list"
                    className="text-center mb-8 sm:mb-12 px-2 sm:px-0"
                >
                    <div className="flex justify-end sm:flex-row  items-center mb-4 gap-4">
                        <Input
                            placeholder={useTranslation('Cari Formulir ...')}
                            value={searchQuery}
                            onChange={e => {
                                setSearchQuery(e.target.value)
                                setCurrentPage(1)
                            }}
                            className="max-w-sm"
                        />
                    </div>

                    <div className="overflow-x-auto rounded-lg shadow-md">
                        <Table
                            aria-label={'Daftar Formulir Layanan'}
                            classNames={{
                                wrapper: 'rounded-lg min-w-[800px]',
                                th: 'bg-[#003366] text-white text-xs sm:text-sm',
                                tr: '[&:nth-child(odd)]:bg-white [&:nth-child(even)]:bg-[#003366]/5 hover:bg-[#FFD700]/10',
                                td: 'text-xs sm:text-sm'
                            }}
                        >
                            <TableHeader>
                                <TableColumn className="w-[80px]">
                                    {useTranslation('No')}
                                </TableColumn>
                                <TableColumn>
                                    {useTranslation('Nama Formulir')}
                                </TableColumn>
                                <TableColumn className="w-[120px]">
                                    {useTranslation('Tipe')}
                                </TableColumn>
                                <TableColumn className="w-[120px]">
                                    {' '}
                                </TableColumn>
                            </TableHeader>
                            <TableBody>{documentRows}</TableBody>
                        </Table>
                    </div>
                    {filteredDocuments.length > 0 && (
                        <div className="flex flex-col items-center mt-5">
                            <p className="text-center text-main-blue-light">
                                Total Item <span>: {DataPagination.total}</span>
                            </p>
                            <Pagination
                                disableCursorAnimation
                                showControls
                                className="gap-2"
                                initialPage={DataPagination.current_page}
                                radius="full"
                                renderItem={paginateRenderItem}
                                total={DataPagination.last_page}
                                page={DataPagination.current_page}
                                onChange={handleMovePage}
                                variant="light"
                            />
                        </div>
                    )}
                </SectionTrigerScroll>
            </div>
        </AppLayout>
    )
}

export default FormLayanan
