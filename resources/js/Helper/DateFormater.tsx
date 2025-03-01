export const DateFormater = ({ date }: { date: Date }) => {
    return new Intl.DateTimeFormat('id-ID', {
        weekday: 'long',
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    }).format(new Date(date))
}

export const DateExtraktor = ({ date }: { date: Date | string }) => {
    if (typeof date === 'string') {
        date = new Date(date)
    }
    return {
        date: date.getDate(),
        month: date.toLocaleString('default', { month: 'short' }),
        year: date.getFullYear()
    }
}
