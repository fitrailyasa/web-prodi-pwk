import { eventTypes } from '@/types/PropsType'
import MultyPersonIcon from '../Icon/MultyPersonIcon'
import { DateExtraktor } from '@/Helper/DateFormater'
import {
    Button,
    Modal,
    ModalBody,
    ModalContent,
    ModalFooter,
    ModalHeader,
    useDisclosure
} from '@heroui/react'
import ClaenderIcon from '../Icon/CalenderIcon'
import ControlCenterMac from '../ControlCenterMac'
import ShareIcon from '../Icon/ShareInco'
import { useTranslation } from '@/Hooks/useTranslation'

const EvenContainer: React.FC<eventTypes> = ({
    title,
    dateStart,
    date,
    dateEnd,
    description
}: eventTypes) => {
    const { isOpen, onOpen, onOpenChange } = useDisclosure()
    // get full mount
    const eventStart = DateExtraktor({ date: dateStart })

    const eventEnd = dateEnd && DateExtraktor({ date: dateEnd })

    const format = (d: Date) => d.toISOString().replace(/[-:]|\.\d{3}/g, '') // Format YYYYMMDDTHHmmssZ

    const handleAddToCalendar = () => {
        const titleData = encodeURIComponent(title)
        const descriptionData = encodeURIComponent(description)
        // const locationData = encodeURIComponent('Jl. Contoh No. 1, Jakarta') &location=${location}
        const startDate = format(new Date(date)) // Format: YYYYMMDDTHHmmssZ (UTC)
        const endDate = format(dateEnd ? new Date(dateEnd) : new Date(date))

        const calendarUrl = `https://www.google.com/calendar/render?action=TEMPLATE&text=${title}&dates=${startDate}/${endDate}&details=${description}&sf=true&output=xml`

        window.open(calendarUrl, '_blank')
    }

    return (
        <>
            <button
                onClick={onOpen}
                className="border p-3 rounded-2xl flex gap-3 items-center bg-secondary-blue-light w-full lg:w-fit"
            >
                <div className="flex md:flex-nowrap gap-3 items-center">
                    <div className="flex border-e-2 border-main-green items-center px-3 ">
                        <span className="text-sm md:text-lg font-bold text-nowrap text-main-green">
                            {eventStart.date} {eventStart.month}{' '}
                            {eventEnd &&
                                ` - ${eventEnd.date}, ${eventEnd.month}`}
                        </span>
                    </div>
                    <h1 className="text-sm md:text-lg text-wrap w-full font-bold  text-main-blue-light">
                        {useTranslation(title ?? '')}
                    </h1>
                </div>
            </button>

            <Modal
                isOpen={isOpen}
                size="4xl"
                placement="bottom-center"
                onOpenChange={onOpenChange}
            >
                <ModalContent>
                    {onClose => (
                        <>
                            <ModalHeader>
                                <ControlCenterMac />
                            </ModalHeader>
                            <ModalBody className="px-10 py-4">
                                <div className="flex gap-3 items-center py-3">
                                    <ClaenderIcon
                                        size={5}
                                        className="text-main-green text-sm md:text-lg"
                                    />
                                    <div className="">
                                        <p className="text-sm md:text-lg font-semibold">
                                            {useTranslation('Tanggal Awal')} :{' '}
                                        </p>
                                        <span className="text-md md:text-2xl font-bold text-main-green">
                                            {eventStart.date},{' '}
                                            {eventStart.month} {eventStart.year}
                                        </span>
                                    </div>
                                    {eventEnd && (
                                        <div className="">
                                            <p className="text-sm md:text-lg font-semibold">
                                                {useTranslation(
                                                    'Tanggal Akhir'
                                                )}{' '}
                                                :{' '}
                                            </p>
                                            <span className="text-md md:text-2xl font-bold text-main-green">
                                                {eventEnd.date},{' '}
                                                {eventEnd.month} {eventEnd.year}
                                            </span>
                                        </div>
                                    )}
                                </div>
                                <h1 className="text-md md:text-2xl font-bold">
                                    {useTranslation(title)}
                                </h1>
                                <p
                                    className="text-sm md:text-md"
                                    dangerouslySetInnerHTML={{
                                        __html: useTranslation(
                                            description ?? ''
                                        )
                                    }}
                                ></p>
                            </ModalBody>
                            <ModalFooter>
                                <Button
                                    className="bg-red-500 text-white font-semibold"
                                    onPress={onClose}
                                >
                                    {useTranslation('Tutup')}
                                </Button>
                                <Button
                                    className="bg-main-green flex gap-1 text-white font-semibold"
                                    onPress={handleAddToCalendar}
                                >
                                    {useTranslation('Simpan Ke Kalender')}
                                    <ShareIcon size={1} className="text-xl" />
                                </Button>
                            </ModalFooter>
                        </>
                    )}
                </ModalContent>
            </Modal>
        </>
    )
}

export default EvenContainer
