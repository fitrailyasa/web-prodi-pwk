export type eventTypes = {
    title: string
    dateStart: Date
    date: Date
    dateEnd?: Date
    description: string
}

export type evenByBulanType = {
    bulan: string
    events: Array<eventTypes>
}

export type MisiType = {
    title: string
}
