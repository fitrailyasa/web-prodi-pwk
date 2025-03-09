import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import ControlCenterMac from '@/Components/ControlCenterMac'
import AlumniItem from '@/Components/Profile/Alumni/AlumniItem'
import PaginationComponent from '@/Components/Utils/Pagination'
import { TestImage } from '@/Constants'
import AppLayout from '@/Layouts/AppLayout'
import { AlumniItemTypes, AlumniPageProps } from '@/types'
import {
    Button,
    Input,
    Modal,
    ModalBody,
    ModalContent,
    ModalFooter,
    ModalHeader,
    Pagination,
    Select,
    SelectItem,
    useDisclosure
} from '@heroui/react'
import React from 'react'

const Alumni: React.FC<AlumniPageProps> = ({ alumni }) => {
    const {
        isOpen: isOpenFilter,
        onOpen: onOpenFilter,
        onOpenChange: onOpenChengeFilter
    } = useDisclosure()

    console.log(alumni)
    // console.log(pagination)

    const dataYear = [
        {
            key: 2024,
            label: String(2024)
        },
        {
            key: 2025,
            label: String(2025)
        }
    ]
    return (
        <AppLayout title="Kalender Akademik">
            <div className="container mx-auto px-4 py-3 min-h-[74vh]">
                <SectionTrigerScroll id={'alummi-header'}>
                    <h1 className="font-bold text-3xl pb-4 border-b mb-3">
                        Alumni PWK ITERA
                    </h1>
                </SectionTrigerScroll>
                <div className="flex justify-end">
                    <Button
                        className="bg-main-green text-white font-semibold"
                        onPress={onOpenFilter}
                    >
                        Filter
                    </Button>
                </div>
                <Modal
                    isOpen={isOpenFilter}
                    size="4xl"
                    placement="top"
                    onOpenChange={onOpenChengeFilter}
                >
                    <ModalContent>
                        {onClose => (
                            <>
                                <ModalHeader>
                                    <ControlCenterMac />
                                </ModalHeader>
                                <ModalBody className="px-10 py-4 overflow-hidden">
                                    <div className="grid grid-cols-2 gap-3">
                                        <Select
                                            className="text-nowrap justify-start items-center font-bold"
                                            label="Tahun Masuk"
                                            labelPlacement="outside-left"
                                            placeholder="Select an animal"
                                        >
                                            {dataYear.map(year => (
                                                <SelectItem key={year.key}>
                                                    {year.label}
                                                </SelectItem>
                                            ))}
                                        </Select>
                                        <Select
                                            className="text-nowrap justify-start items-center font-bold"
                                            label="Tahun Lulus"
                                            labelPlacement="outside-left"
                                            placeholder="Select an animal"
                                        >
                                            {dataYear.map(year => (
                                                <SelectItem key={year.key}>
                                                    {year.label}
                                                </SelectItem>
                                            ))}
                                        </Select>
                                    </div>
                                </ModalBody>
                                <ModalFooter>
                                    <Button
                                        className="bg-red-500 text-white font-semibold"
                                        onPress={onClose}
                                    >
                                        Close
                                    </Button>
                                </ModalFooter>
                            </>
                        )}
                    </ModalContent>
                </Modal>
                <div className="flex flex-wrap gap-5 justify-center">
                    {alumni.data.map((item, index) => (
                        <AlumniItem key={index} data={item} />
                    ))}
                </div>

                <PaginationComponent
                    current_page={alumni.current_page}
                    page_url={alumni.path}
                    las_page={alumni.last_page}
                    total={alumni.total}
                />
            </div>
        </AppLayout>
    )
}

export default Alumni
