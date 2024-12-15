export const DateFormater = ({ date }: { date: Date }) => {
    return new Intl.DateTimeFormat('id-ID', {
        weekday: 'long',
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    }).format(new Date(date))
}

export const DateExtraktor = ({ date }: { date: Date }) => {
    return {
        date: date.getDate(),
        month: date.toLocaleString('default', { month: 'short' }),
        year: date.getFullYear()
    }
}
